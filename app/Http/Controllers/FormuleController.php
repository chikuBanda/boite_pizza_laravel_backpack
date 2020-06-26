<?php

namespace App\Http\Controllers;

use App\Models\Formule;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Produit;
use Illuminate\Support\Facades\Session;

class FormuleController extends Controller
{
    public function list()
    {
        return view('formule.formules', ['formules' => Formule::all()]);
    }

    public function postAddToCart(Request $request, $id)
    {
        if(Formule::find($id)->nomFormule == 'solo')
        {
            if ($request->has('chicken_wings')) {
                $pizza1 = Produit::where('nom', $request->input('pizza1'))->first();
                $chicken_wings = Produit::where('nom', $request->input('chicken_wings'))->first();
                $boisson = Produit::where('nom', $request->input('boisson'))->first();

                $produits = collect([$pizza1, $chicken_wings, $boisson]);
            }
            if ($request->has('salade_verte')) {
                $pizza1 = Produit::where('nom', $request->input('pizza1'))->first();
                $salade_verte = Produit::where('nom', $request->input('salade_verte'))->first();
                $boisson = Produit::where('nom', $request->input('boisson'))->first();

                $produits = collect([$pizza1, $salade_verte, $boisson]);
            }

        }
        else if(Formule::find($id)->nomFormule == 'duo')
        {
            if ($request->has('chicken_wings')) {
                $pizza1 = Produit::where('nom', $request->input('pizza1'))->first();
                $pizza2 = Produit::where('nom', $request->input('pizza2'))->first();
                $chicken_wings = Produit::where('nom', $request->input('chicken_wings'))->first();
                $boisson1 = Produit::where('nom', $request->input('boisson1'))->first();
                $boisson2 = Produit::where('nom', $request->input('boisson2'))->first();

                $produits = collect([$pizza1, $pizza2, $chicken_wings, $boisson1, $boisson2]);
            }
            if ($request->has('salade_verte')) {
                $pizza1 = Produit::where('nom', $request->input('pizza1'))->first();
                $pizza2 = Produit::where('nom', $request->input('pizza2'))->first();
                $salade_verte = Produit::where('nom', $request->input('salade_verte'))->first();
                $boisson1 = Produit::where('nom', $request->input('boisson1'))->first();
                $boisson2 = Produit::where('nom', $request->input('boisson2'))->first();

                $produits = collect([$pizza1, $pizza2, $salade_verte, $boisson1, $boisson2]);
            }

        }
        else if(Formule::find($id)->nomFormule == 'familiale')
        {
            if ($request->has('chicken_wings')) {
                $pizza1 = Produit::where('nom', $request->input('pizza1'))->first();
                $pizza2 = Produit::where('nom', $request->input('pizza2'))->first();
                $pizza3 = Produit::where('nom', $request->input('pizza3'))->first();
                $chicken_wings = Produit::where('nom', $request->input('chicken_wings'))->first();
                $grand_boisson = Produit::where('nom', $request->input('grand_boisson'))->first();

                $produits = collect([$pizza1, $pizza2, $pizza3, $chicken_wings, $grand_boisson]);
            }
            if ($request->has('salade_verte')) {
                $pizza1 = Produit::where('nom', $request->input('pizza1'))->first();
                $pizza2 = Produit::where('nom', $request->input('pizza2'))->first();
                $pizza3 = Produit::where('nom', $request->input('pizza3'))->first();
                $salade_verte = Produit::where('nom', $request->input('salade_verte'))->first();
                $grand_boisson = Produit::where('nom', $request->input('grand_boisson'))->first();


                $produits = collect([$pizza1, $pizza2, $pizza3, $salade_verte, $grand_boisson]);
            }
        }
        else if(Formule::find($id)->nomFormule == 'match')
        {
            $pizza1 = Produit::where('nom', $request->input('pizza1'))->first();
            $pizza2 = Produit::where('nom', $request->input('pizza2'))->first();
            $pizza3 = Produit::where('nom', $request->input('pizza3'))->first();
            $vin = Produit::where('nom', $request->input('vin'))->first();

            $produits = collect([$pizza1, $pizza2, $pizza3, $vin]);
        }


        $formule = Formule::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $key = 'f'.$formule->codeFormule.$cart->n;
        $cart->addFormule($formule, $key, $produits);

        $request->session()->put('cart', $cart);
        return redirect('/formules');
    }

    public function carttest()
    {
        dd(session()->all());
    }
}
