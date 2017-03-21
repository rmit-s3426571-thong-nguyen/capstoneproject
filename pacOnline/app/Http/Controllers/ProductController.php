<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
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

        $product->title = request('title');
        $product->desc = request('desc');
        $product->price = request('price');
        $product->imageLocation = request('imageLocation');

        // save to the database
        $product->save();

        // redirect to home page
        return redirect('/');
    }
}
