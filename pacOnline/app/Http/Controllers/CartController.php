<?php

namespace App\Http\Controllers;

use Auth;
use App\Cart;
use App\Product;
use function GuzzleHttp\Promise\all;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Session;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index','show', ]);
    }

    public function cart()
    {
        if (!Session::has('cart'))
        {
            return view('cart.cart');
        }
        else
        {
            $origCart = Session::get('cart');
            $newCart = new Cart($origCart);
            return view('cart.cart',['products' => $newCart->products, 'totalPrice' => $newCart->totalPrice]);
        }
    }

    public function addToCart(Request $request, $id)
    {
        $product = Product::find($id);

        $origCart = Session::has('cart') ? Session::get('cart') : null;

        $newCart = new Cart($origCart);

        $newCart->add($product, $product->id);

        $request->session()->put('cart', $newCart);

        return redirect('/');

    }

    public function removeFromCart($id){

        //this will return a list of products in cart
        $cart = Session::get('cart');

        $removeProduct = Product::find($id);

        foreach ($cart->products as $product){
            if ($product['product']['id'] == $removeProduct->id ){
                $cart->remove($removeProduct, $removeProduct->id);
                request()->session()->forget($removeProduct->id);
            }
        }
        request()->session()->put('cart', $cart);

        if($cart->totalQty == 0){
            request()->session()->forget('cart');
        }
        return redirect()->back();
    }

    public function emptyCart(){
        if (!Session::has('cart'))
        {
            return view('cart.cart');
        }
        else
        {
            // https://laravel.com/docs/5.4/session#deleting-data
            request()->session()->forget('cart');
            return redirect()->back();
        }
    }
}
