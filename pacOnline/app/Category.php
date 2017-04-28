<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $fillable = ['name','parent_id'];

    public function children() {
        return $this->hasMany(Category::class, 'parent_id','id');
    }


    public function products()
    {
    	 return $this->hasMany(Product::class); 
    }
}
