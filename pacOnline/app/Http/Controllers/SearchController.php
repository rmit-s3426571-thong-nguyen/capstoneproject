<?php
/* NOTE :: I just realised that it wont show the information
 * because search table does not hold the same information as the products table
 * and all views are currently running of products table...
 */

namespace App\Http\Controllers;

use App\Product;
use App\Search;
use Illuminate\Http\Request;
use Session;

class SearchController extends Controller
{
    // basic linear search
    public function index(Request $request) {
        $this->validate($request, ['search' => 'required',]);

        $query = $request->get('search');

        $products = $query
            ? Product::where('title', 'LIKE', '%'.$query.'%')
                     ->orWhere('desc', 'LIKE', '%'.$query.'%')->latest()->get()
            : Product::latest()->get();

        return view('search.result', compact('products'));
    }

/*
 *
 *
 *
    public function index(Request $request) {

        $this->validate($request, ['search' => 'required',]);

        // Scores
        $score_title = 10; // Match in title
        $score_desc = 5; //Match in description
        $score_interest_1 = 5; // Tag match highest priorotised interest
        $score_interest_2 = 3; // Tag match second highest priorotised interest
        $score_interest_3 = 1; // Tag match third third priorotised interest
        $score_zip = 2; // Seller is located in same postcode
        $score_state = 1; // Seller is located in same state

        $query = $request->get('search');
        $products = Product::latest()->get();

        // Clears table
        Search::truncate();

        // Adding products to search table
        foreach ($products as $item) {
            
            // Give score for title match
            if (Product::where('title', 'LIKE', '%'.$query.'%')) {

                $search = new Search;
               
                $search->id = $item['id'];
                $search->score = $score_Title;
                $search->save();
            }

            // Give score for description match
            if (Product::where('desc', 'LIKE', '%'.$query.'%')) {

                if(Search::where('id', 'LIKE', $item['id'])) {
                    $item->score += $score_Desc;
                }
                else {
                    $search = new Search;
                    
                    $search->id = $item['id'];
                    $search->score = $scoreDesc;
                    $search->save();
                }
            }

            foreach ($search as $item) {
                
                $user = Auth::user();
                $seller = User::find($item->$user_id);

                /* Give score based on interest and tags
                 * CHANGE THIS WHEN TAGS AND INTERESTS HAVE BEEN ADDED
                 * /
                if ($item->$tag LIKE $user->interest_1) {
                    $item->score += $score_interest_1;
                }

                if ($item->$tag LIKE $user->interest_2) {
                    $item->score += $score_interest_2;
                }

                if ($item->$tag LIKE $user->interest_3) {
                    $item->score += $score_interest_3;
                }

                // Give score based on location
                if ($seller->$zip LIKE $user->$zip) {
                    $item->score += $score_zip;
                }
                if ($seller->state LIKE $user->$state) {
                    $item->score += $score_state;
                }
            }
        }

        // Sort by score -- method 1
        $search = Search::orderBy('score', 'DESC')->get();
    	
        return view('search.result', compact('search'));
    }
 *
 *
 *
 */



    /* 
     * The following code was adapted from http://idiallo.com/blog/php-mysql-search-algorithm
     * For educational purposes only
     */

    //Separates query string into individual words and filter query
    public function filter(Request $request) {
        $query = trim(preg_replace("/(\s+)+/", " ", $request));
        $words =  array();
        $filter = array("a","and","in","is","it","on","or","the");
        $count = 0;

        foreach (explode(" ", $query) as $key => $value) {
            if (in_array($key, $list)) {
                continue;
            }
            $words[] = $key;
            if ($count >= 10) {
                break;
            }
        }
        return $words;
    }
}
