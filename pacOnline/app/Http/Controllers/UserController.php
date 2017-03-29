<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function save(Request $request)
    {
        // Stores new user record in database and assigns role
        $role_user = App\Role::where('name', 'user')->first();

        $user = new App\User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->birth = $request->birth;
        $user->address = $request->address;
        $user->password = $request->password;
        $user->save();
        $user->roles()->attach($role_user);
    }

    public function displaydetails($id)
    {
        return view('/mydetails');
    }
}
