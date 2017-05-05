<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserCategoriesList extends Model
{
    //

    protected $table = "user_categories_list";

    protected $fillable = [
        'user_id', 'cat_id'
    ];

    public function user() {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function category() {
        return $this->belongsTo('App\Category', 'cat_id', 'id');
    }

}
