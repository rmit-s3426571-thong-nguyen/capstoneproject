<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Search extends Model
{
	/* 
     * The following has been adapted from https://www.youtube.com/watch?v=ku3Lyy9wIm4
     * For educational purposes only
     */
    public function scopeSearch($query, $s) {
        return $query->where('title','like','%'.$s.'%')->orWhere('desc','like','%'.$s.'%');
    }

    

    /* 
     * The following has been adapted from http://idiallo.com/blog/php-mysql-search-algorithm
     * For educational purposes only
     */

    // Scoring sheet

    // Full search matched in title
    $scoreFullInTitle = 10;
    // Part of search matched in title
    $scorePartInTitle = 8;
    // Full search matched in description
    $scoreFullInDesc = 7;
    // Part of search matched in description
    $scorePartInDesc = 5;
    // Search matched a category
    $scoreCategory = 3;
    // Search matched with part of url
    $scorePartUrl = 1;


    /*
     * Function to remove irrelevant words from search
     */
    public function filterSearch($query) {
        $query = trim(preg_replace("/(\s+)+/", " ", $query));
        $words = array();

        // words to be filtered out
        $list = array("the","a","in","of","for","");
        $count = 0;

        foreach(explode(" ", $query) as $key) {
            if(in_array($key, $list)) {
                continue;
            }
            $words[] = $key;
            if($count >= 15) {
                break;
            }
            $count++;
        }
        return $words;
    }

    /* 
     * Function to limit number of characters allowed to be searched
     */
    public function limitSearchChars($query, $limit = 200) {
        return subst($query, 0, $limit);
    }
}