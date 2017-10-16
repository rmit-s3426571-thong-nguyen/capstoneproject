<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Category;


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
   

 // Save categories in the database for category 1, 2 and 3
   public function update(Request $request, $id)
   {
    $user = Auth::user();
    $user->name = Request::input('name');
    $user->email = Request::input('email');
            $user->categories()->saveMany([
            new UserCategoriesList(['cat_id' => $data['category_1']]),
            new UserCategoriesList(['cat_id' => $data['category_2']]),
            new UserCategoriesList(['cat_id' => $data['category_3']]),
        ]);
    $user->save();
    return $user;
    return view('/mydetails/{username}');
   }
}
