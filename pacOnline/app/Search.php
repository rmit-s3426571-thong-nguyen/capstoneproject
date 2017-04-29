<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Search extends Model
{
    protected $table = 'search';

    public function products()
    {
	    return $this->hasMany(Product::class);
    }

    public $timestamps = false;
}