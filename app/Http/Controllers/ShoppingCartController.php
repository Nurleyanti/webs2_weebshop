<?php
/**
 * Created by PhpStorm.
 * User: Donneh de beest
 * Date: 12-3-2018
 * Time: 14:59
 */

namespace App\Http\Controllers;

 use \App\Product;
 use \App\Cart;
 use Illuminate\Support\Facades\Session;
 use Illuminate\Http\Request;


 class ShoppingCartController
{

     public function index()
     {
         return view('shoppingcart');
     }
    public function getAddToCart(Request $request, $id){
        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);

        $request->session()->put('cart',$cart);
        return redirect()->route('home');
    }

    public function getCart() {
        if (!Session::has('cart')) {
            return view('shoppingcart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        return view('shoppingcart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }

}