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

}
