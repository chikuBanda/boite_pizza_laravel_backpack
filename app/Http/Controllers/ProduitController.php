<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Cart;
use App\Models\Catproduit;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;

class ProduitController extends Controller
{
    public function list(Request $request, $cat = '')
    {
        if($cat != '' && $cat != null)
        {
            $temp = Catproduit::where('nomCat', $cat)->first();
            if($temp)
            {
                return view('produit.produits', ['produits' => Produit::all(), 'categories' => Catproduit::all(), 'cat' => $cat, 'path' => $request->url()]);
            }
            else
            {
                return redirect('/produits');
            }
        }
        else{
            return view('produit.produits', ['produits' => Produit::all(), 'categories' => Catproduit::all(), 'cat' => 'pizza', 'path' => $request->url()]);
        }
    }

    public function getAddToCart(Request $request, $id)
    {
        $produit = Produit::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $key = 'p'.$produit->codeProduit;
        $cart->addProduit($produit, $key);

        $request->session()->put('cart', $cart);
        $request->session()->put('hello', 'hello');
        //return redirect()->back();
        return Redirect::to(URL::previous() . "#contents");
    }
}
