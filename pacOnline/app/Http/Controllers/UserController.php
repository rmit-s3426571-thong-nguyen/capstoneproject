<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;


class UserController extends Controller
{
   public function mydetails($id)
   {
     $user = User::whereId($id)->first();
     return view('User.mydetails', compact('user'));
   }


   public function store(Request $request)
   {
   	 User::create($request->all());
   }

   public function edit($id)
   {
     $user = User::findOrFail($id);
   	 return view('User.edit', compact('user'));
   }
   
   public function update(Request $request, $id)
   {
    /*$user = User::findOrFail($id);
    $user->update($request->all());
    return Redirect::to('/mydetails/{username}');*/
    $user = Auth::user();
    $user->name = Request::input('name');
    $user->email = Request::input('email');
    $user->save();
    return view('/mydetails/{username}');
   }
}
