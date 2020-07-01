<?php

namespace App\Http\Controllers;

use App\Mail\CommandExecute;
use App\Models\Cart;
use App\Models\Cmd;
use App\Models\Cmdformligneproduit;
use App\Models\Formule;
use App\Models\Lignecmdform;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Mail;
use Stripe\PaymentIntent;
use Stripe\Stripe;
use PDF;

class CmdController extends Controller
{
    public function checkout()
    {
        if (Auth::check()) {
            if(!Session::has('cart'))
            {
                return redirect('/');
            }

            $oldCart = Session::get('cart');
            $cart = new Cart($oldCart);
            $total = $cart->totalPrice;
            return view('commande.checkout', ['total' => $total]);
        }
        else{
            return redirect('login');
        }
    }

    public function postCheckout(Request $request)
    {
        if(!Session::has('cart'))
        {
            return redirect('/');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        Stripe::setApiKey("sk_test_KTU1mI2lVJ95CKmZ5gmDmLtw00RzlcYfSe");
        try{
            \Stripe\Charge::create([
                //'amount' => $cart->totalPrice * 100,
                'amount' => $request->input('totale') * 100,
                'currency' => 'usd',
                'source'=> "tok_mastercard",
                'description' => 'My First Test Charge (created for API docs)',
              ]);
        }
        catch(Exception $e){
            return redirect()->route('checkout')->with('error', $e->getMessage());
        }
        $this->enregistrerCmd($request);
        Session::forget('cart');
        return redirect('thanks')->with('success', 'successfully purchased');
    }

    public function enregistrerCmd(Request $request)
    {
        if(Session::has('cart'))
        {
            $client = Auth::user();

            $cmd = new Cmd;

            $cmd->numClient = $client->numClient;
            $cmd->adresseLiv = $request->input('address');
            $cmd->type = 'livraison';
            $cmd->date = Carbon::now()->toDateTimeString();
            $cmd->secteur = $request->input('sector');
            $cmd->realise = 1;
            $cmd->prixLiv = $request->input('prix_liv');
            $cmd->sousTotale = $request->input('sous_totale');
            $cmd->totale = $request->input('totale');

            $cmd->save();

            $produits = Session::get('cart')->items;
            foreach ($produits as $id => $produit) {
                if($id[0] == 'p')
                {
                    $cmd
                        ->produits()
                        ->attach(
                            $produit['item']->codeProduit,
                            [
                                'prix'=>$produit['prix'],
                                'nb'=>$produit['quantity']
                            ]
                        );
                }

                if($id[0] == 'f')
                {
                    $cmd
                        ->formules()
                        ->attach($produit['item']->codeFormule,
                        [
                            'prix'=>$produit['prix'],
                            'nb'=>$produit['quantity']
                        ]
                    );

                    $lignecmdform = Lignecmdform::where('numCommande', $cmd->numCommande)
                                    ->where('codeFormule', $produit['item']->codeFormule)->first();

                    if($produit['produits'])
                    {
                        foreach($produit['produits'] as $produitItem)
                        {
                            $lignecmdform
                            ->produits()
                            ->attach($produitItem->codeProduit);
                        }
                    }
                }

            }

            Mail::to($cmd->client->email)->send(new CommandExecute($cmd));
            $request->session()->put('cmd', $cmd);
            //$request->session()->put('cmd', Cmd::find(48));
        }
    }

    public function getCart()
    {
        if (!Session::has('cart'))
        {
            return view('commande.cart');
        }

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('commande.cart', ['items' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }

    public function updateCart(Request $request)
    {
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        $totalQuantity = 0;
        $totalPrice = 0;

        foreach($cart->items as $id=>$item)
        {
            if(!$request->input($id))
            {
                unset($cart->items[$id]);
            }
            else
            {
                $qty = $request->input($id);
                $cart->items[$id]['quantity'] = $qty;
                $cart->items[$id]['prix'] = $cart->items[$id]['item']->prix * $qty;
                $totalQuantity += $qty;
                $totalPrice += $cart->items[$id]['prix'];
            }
        }

        $cart->totalPrice = $totalPrice;
        $cart->totalQuantity = $totalQuantity;

        if($cart->totalQuantity == 0)
        {
            $request->session()->forget('cart');
        }
        else
        {
            $request->session()->put('cart', $cart);
        }

        return redirect()->route('getCart');
    }

    public function thanyou(Request $request)
    {
        if($request->session()->has('success'))
        {
            return view('commande.thank-you');
        }
        else
        {
            return redirect('/carttest');
        }
    }

    public function recu(Request $request)
    {
        if($request->session()->has('cmd'))
        {
            $cmd = Session::get('cmd');
            $exisitFormule = false;

            if($cmd->formules->count() > 0){
                $exisitFormule = true;
            }

            $pdf = PDF::loadView('commande.recu', ['cmd' => $cmd, 'exisitFormule' => $exisitFormule]);
            //return $pdf->download('recu.pdf');


            return $pdf->stream();
        }
        else
        {
            return redirect('/');
        }
    }

    public function carttest(Request $request)
    {
        dd($request->session()->get('cart'));
    }
}
