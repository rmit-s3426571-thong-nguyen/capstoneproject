<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Search extends Model
{
    protected $searchable = [
        /**
         * Columns and their priority in search results.
         * Columns with higher values are more important.
         */
        'product' => [
            'title' => 10,
            'desc' => 5,
        ],
    ];

    public function scopeSearch($query, $s) {
        return $query->where('title', 'like', '%'.$s.'%')
                     ->orWhere('desc', 'like', '%'.$s.'%')
    }
}