<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use DB;

class SearchController extends Controller
{
    public function index(Request $request) {

        $this->validate($request, ['search' => 'required',]);

        $query = $request->get('search');

        $products = $query
            ? Product::where('title', 'LIKE', "%$query%")
                     ->orWhere('desc', 'LIKE', '%'.$request->search.'%')->latest()->get()
            : Product::latest()->get();
    	
        return view('search.result', compact('products'));
        //return view('search.result');
    }



    /* The following code was adapted from http://idiallo.com/blog/php-mysql-search-algorithm
     * For educational purposes only
     */

    // Separates query string into individual words and filter query
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

    /* Search with score
    public function search(Resquest $request)
    {
        $query = trim($request);

        // Scores
        $scoreFullTitle = 10; // Exact match in title
        $scoreTitleKey = 5; // Match title in part
        $scoreFullDesc = 8; //Exact match in description
        $scoreDescKey = 2; // Match description in part
        $score = 0; // initial score

        $keywords = filter($query);
        $products = DB::table('products');
        $titleSQL = array();
        $descSQL = array();
        $title_arr = array();
        $desc_arr = array();

        // Exact match ; higher chances of appearing at top of result

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
        


        if (count($keywords) > 1) {
            $titleSQL[] = "if (title LIKE '%''.$query.''%', {$scoreFullTitle}, 0)";
            $descSQL[] = "if (desc LIKE '%''.$query.''%', {$scoreFullDesc}, 0)";

            // Part match ; compare query and database word for word
            foreach($keywords as $key) {
                $titleSQL[] = "if (
                                    title_arr = explode(title)
                                    title_arr LIKE '%''.DB::escape($key.''%',,{$scoreTitleKey},0)";
                $sumSQL[] = "if (desc LIKE '%''.DB::escape($key).''%',,{$scoreDescKey},0)";

                // Just incase it's empty, add 0
                if (empty($titleSQL)){
                    $titleSQL[] = $noScore;
                }
                if (empty($descSQL)){
                    $descSQL[] = $noScore;
                }

                $sql = "SELECT products.title,products.desc
                        (
                            (-- Title score
                                ".implode(" + ", $titleSQL)." ) 
                            +
                            (-- Description score
                                ".implode(" + ", $descSQL)." )
                        ) as relevance
                        FROM products
                        HAVING relevance > 0
                        ORDER BY relevance title
                        LIMIT 10";
                }
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
    }*/
}
