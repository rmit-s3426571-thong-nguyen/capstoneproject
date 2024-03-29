<?php

namespace TCG\Voyager\Models;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Traits\Translatable;

class Category extends Model
{
    use Translatable;

    protected $translatable = ['name'];

    protected $table = 'categories';

    protected $fillable = ['slug', 'name'];

    public function products()
    {
         return $this->hasMany(Product::class);
    }

    // public function posts()
    // {
    //     return $this->hasMany(Voyager::modelClass('Post'))
    //         ->published()
    //         ->orderBy('created_at', 'DESC');
    // }

    public function children() {
        return $this->hasMany(Category::class, 'parent_id','id');
    }

    public function parentId()
    {
        return $this->belongsTo(self::class);
    }

    public function users()
    {
         return $this->hasMany(User::class); 
    }
}
