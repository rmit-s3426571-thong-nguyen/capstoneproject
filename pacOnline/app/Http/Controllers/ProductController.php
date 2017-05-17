<?php

namespace App\Http\Controllers;

use Auth;
use App\Product;
use App\Category;
use App\UserCategoriesList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

use Session;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index','show', ]);
    }

    public function recommendation()
    {
        if($user = Auth::user())
        {
            $allUsersCats = $user->categories()->get();

            $products = collect(new Product);

            foreach ($allUsersCats as $userCat) {

                $userCatProducts = Product::where('category_id', $userCat->cat_id)->orderBy('created_at','DESC')->get();

                foreach($userCatProducts as $product){
                    $products->push($product);
                }
            }
            return view('foryou.index',compact('products'));
        }
    }

    public function index()
    {
        $catID = request('category');
        $price_min = request('price-min');
        $price_max = request('price-max');
        $sort = request('sort');

        if ($catID){
            $products = Product::where('category_id',$catID)->orderBy('created_at','DESC')->get();
        }elseif ($price_min || $price_max){
            $products = Product::whereBetween('price', [$price_min, $price_max])->get();
        }elseif($sort){
            if ($sort == "lth")
                $products = Product::orderBy('price','ASC')->get();
            elseif ($sort == "htl")
                $products = Product::orderBy('price','DESC')->get();
        }
        else{
            $products = Product::latest()->get();
        }

        $categories = Category::all();
        return view('shop.index',compact('products', 'categories'));
    }

    //get all products and pass to UserProducts
     public function index2($id)
    {
        //using Elequent to get all the products
        $products = Product::whereUser_id($id)->get();
        return view('shop.mylistingindex', compact('products'));
    }


    public function create()
    {
        $categories = Category::all();
    	return view('shop.create',compact('categories'));
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
            'category_id' => 'required|integer',
            'price' => 'required|regex:/^[0-9]+(\.[0-9][0-9]?)?$/',
            'image' => 'image|max:2000',
        ]);

        $s3 = Storage::disk('s3');
        $image = request()->image;

        if (request()->get('sell')){
            $product = new Product;

            $product->user_id = auth()->id();
            $product->title = request('title');
            $product->desc = request('desc');
            $product->category_id = request('category_id');
            $product->price = request('price');

            if ($image){
                $path = $s3->putFileAs('product_images/'.$product->user_id, $image, $image->getClientOriginalName() , 'public');
                $product->imageLocation = Storage::disk('s3')->url($path);

            }else{
                $path = Storage::disk('s3')->url('product_images/default/default.png');
                $product->imageLocation = $path;
            }

            // save to the database
            $product->save();

            // redirect to home page
            return redirect('/');
        }

        $product = new Product;

        $product->user_id = auth()->id();
        $product->title = request('title');
        $product->desc = request('desc');
        $product->category_id = request('category_id');
        $product->price = request('price');

        if ($image){
            $path = $s3->putFileAs('product_images/'.$product->user_id, $image, $image->getClientOriginalName() , 'public');
            $product->imageLocation = Storage::disk('s3')->url($path);

        }else{
            $path = Storage::disk('s3')->url('product_images/default/default.png');
            $product->imageLocation = $path;
        }

        return view('shop.preview', compact('product'));
    }

    public function edit($id)
    {
        $products = Product::findOrFail($id);
        $categories = Category::all();
        return view('shop.editproduct', compact('products','categories'));
    }

    public function update(Request $request, $id)
    {
        $this->validate(request(),[
            'title' => 'required',
            'desc' => 'required',
            'category_id' => 'required|integer',
            'price' => 'required|regex:/^[0-9]+(\.[0-9][0-9]?)?$/',
            'image' => 'image|max:2000',
        ]);

        $product = Product::findOrFail($id);

        $s3 = Storage::disk('s3');
        $image = request()->image;

        $product->title = $request->get('title');
        $product->desc = $request->get('desc');
        $product->category_id = $request->get('category_id');
        $product->price = $request->get('price');

        if ($image != null)
        {
            $path = $s3->putFileAs('product_images/'.$product->user_id, $image, $image->getClientOriginalName() , 'public');
            $product->imageLocation = Storage::disk('s3')->url($path);
        }
        $product->save();
        return redirect("/userproducts/$product->user_id");
    }

    public function destroy($id)
    {
        $products = Product::findOrFail($id);

        $products->delete($id);

        return redirect("/userproducts/$products->user_id");
    }
}
