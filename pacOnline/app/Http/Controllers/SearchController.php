<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use DB;

class SearchController extends Controller
{
    // Displays listings
    public function index(Request $request) {

        $this->validate($request, [
        'search' => 'required',
        ]);

        $query = $request->get('search');

        $products = $query
            ? Product::where('title', 'Like', "%$query%")->orWhere('desc', 'LIKE', '%'.$request->search.'%')->latest()->get()
            : Product::latest()->get();
    	
        return view('search.result', compact('products'));
        //return view('search.result');
    }

    public function search(Resquest $request)
    {
    	if($request->ajax()) {
    		$output="";
    		$products=DB::table('products')->where('title', 'LIKE', '%'.$request->search.'%')
    									   ->orWhere('desc', 'LIKE', '%'.$request->search.'%')->get();
    		if($products) {
    			foreach($products as $key => $product) {
    				$output.='<tr>'.
    						 '<td>'.$product->imageLocation.'</td>'.
    						 '<td>'.$product->title.'</td>'.
    						 '<td>'.$product->desc.'</td>'.
    						 '<td>'.$product->price.'</td>'.
    						 '<td>'.$product->user->name.'</td>'.
    						 '<td>'.$product->created_at->diffForHumans.'</td>'.
    					 	 '</tr>';
    			}
    			return Response($output);
    		}
    	}
    }
}
