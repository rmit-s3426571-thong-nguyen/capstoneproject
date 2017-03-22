<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
	// below created by linh
    public function users() {
		return $this->hasMany('App\User', 'user_role', 'user_id', 'role_id');
	}
}