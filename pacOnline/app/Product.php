<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable =['title','desc','price','imageLocation'];


    public function user(){
        return $this->belongsTo(User::class);
    }
}
