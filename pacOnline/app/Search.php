<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Search extends Model
{
	/* 
     * The following has been adapted from https://www.youtube.com/watch?v=ku3Lyy9wIm4
     * For educational purposes only
     */
    public function search($query, $s) {
        return $query where('title','like','%'.$s.'%')
            ->orWhere('desc','like','%'.$s.'%');
    }
}