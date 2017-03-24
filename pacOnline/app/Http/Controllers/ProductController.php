<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Product;
use Illuminate\Http\Request;
use Session;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index','show']);
    }

    // get all products from database and pass to index to render.
    public function index()
    {
    	//using Elequent to get all the products
        $products = Product::latest()->get();

        return view('shop.index',compact('products'));
    }


    public function create()
    {
    	return view('shop.create');
    }

    public function show(Product $product)
    {
    	return view('shop.show', compact('product'));
    }

    public function store()
    {
        //form validation
        $this->validate(request(),[
            'title' => 'required',
            'desc' => 'required',
            'price' => 'required',
            'imageLocation' => 'required',
        ]);

        // create a new product
        $product = new Product;

        $product->user_id = auth()->id();
        $product->title = request('title');
        $product->desc = request('desc');
        $product->price = request('price');
        $product->imageLocation = request('imageLocation');

        // save to the database
        $product->save();

        // redirect to home page
        return redirect('/');
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

    public function cart()
    {
        if (!Session::has('cart'))
        {
            return view('shop.cart');
        }
        else
        {
            $origCart = Session::get('cart');
            $newCart = new Cart($origCart);
            return view('shop.cart',['products' => $newCart->products, 'totalPrice' => $newCart->totalPrice]);
        }
    }
}
