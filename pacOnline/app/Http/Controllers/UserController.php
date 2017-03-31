<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function save($id, mydetails $request)
    {
        // Stores new user record in database and assigns role
        $role_user = App\Role::where('name', 'user')->first();

        $user = new App\User();
        $user->user_id = auth()->id();
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->birth = $request->get('birth');
        $user->address = $request->get('address');
        $user->password = $request->get('password');
        $user->save();
        $user->roles()->attach($role_user);
        return \Redirect::route('users.mydetails', [$user->id])->with('message', 'User has been updated!');
    }

    public function displaydetails($id)
    {
        return view('/mydetails');
    }
}
