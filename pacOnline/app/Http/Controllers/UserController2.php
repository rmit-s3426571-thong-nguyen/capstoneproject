<?php

namespace App\Http\Controllers;

use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use App\UserCategoriesList;
use App\User;
use Auth;
use App\Category;
use Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UserController2 extends Controller
{
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {

        $user = User::whereId($id)->first();
        $categories = Category::all();

        return view('User.mydetails', compact('user', 'categories'));
    }

    // Create new categories field in the database
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        
        $user->categories()->saveMany([
            new UserCategoriesList(['cat_id' => $data['category_1']]),
            new UserCategoriesList(['cat_id' => $data['category_2']]),
            new UserCategoriesList(['cat_id' => $data['category_3']]),
        ]);

        return view('User.edit', compact('user', 'categories', 'UserCategoriesList'));
    }

    // Validation for the new create user
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'birth' => 'required|date_format:"d/m/Y"|before_or_equal:-13 years|after_or_equal:-80 years',
            'phone' => 'required|regex:/^0[0-8]\d{8}$/',
            'zip' => 'required|regex:/^[0-9]\d{3}$/',
            'password' => 'required|min:6|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\X])(?=.*[!@$#%^&*?]).*$/|confirmed',
        ]);
        
    }

    //Store all user's details into the database
    public function store(Request $request)
    {
        User::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $users = User::findOrFail($id);
        return $users;
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::findOrFail($id);
        $categories = Category::all();

        return view('User.edit', compact('users', 'categories'));
    }


    // Overwrite the user old details with the new one
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            //'email' => 'required|email|max:255|unique:users',
            'birth' => 'required|date_format:"d/m/Y"|before_or_equal:-13 years|after_or_equal:-80 years',
            'phone' => 'required|regex:/^0[0-8]\d{8}$/',
            'zip' => 'required|regex:/^[0-9]\d{3}$/',
            'category_1' => 'integer|different:category_2|different:category_3',
            'category_2' => 'integer|different:category_1|different:category_3',
            'category_3' => 'integer|different:category_1|different:category_2'
        ]);
        $user = User::findOrFail($id);

        foreach($user->categories()->get() as $userCat){
            $userCat->delete();
        }


        // update old user's categories with the newest one
        $user->categories()->saveMany([
            new UserCategoriesList(['cat_id' => $request['category_1']]),
            new UserCategoriesList(['cat_id' => $request['category_2']]),
            new UserCategoriesList(['cat_id' => $request['category_3']]),
        ]);
       
      /*  $UserCategoriesLists = $user->categories()->get();
        foreach ($UserCategoriesLists as $UserCategoriesList){
        echo $UserCategoriesLists;
        Auth::user()->UserCategoriesList()->save($UserCategoriesLists);
        } */
        $user->update($request->all());

        return redirect('/mydetails/{username}');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
