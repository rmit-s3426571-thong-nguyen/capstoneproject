<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class UserController2 extends Controller
{
    public function admin_credential_rules(array $data)
{
  $messages = [
    'current-password.required' => 'Please enter current password',
    'password.required' => 'Please enter password',
  ];

  $validator = Validator::make($data, [
    'current-password' => 'required',
    'password' => 'required|same:password',
    'password_confirmation' => 'required|same:password',     
  ], $messages);

  return $validator;
}  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
         $user = User::whereId($id)->first();
         return view('User.mydetails', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.register');
    }

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
            'Phone' => 'required|regex:/^0[0-8]\d{8}$/',
            'ZIP' => 'required|regex:/^[0-9]\d{3}$/',
            'password' => 'required|min:6|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\X])(?=.*[!@$#%^&*?]).*$/|confirmed',
        ]);
    

/*
        // create a new product
        $user = new User;

       // $user->user_id = auth()->id();
        $user->name = request('name');
        $user->email = request('email');
        $user->birth = request('birth');
        $user->Phone = request('Phone');
        $user->Address = request('Address');
        $user->City = request('City');
        $user->State = request('State');
        $user->ZIP = request('ZIP');
        $user->password = request('password');


        
        //$product->imageLocation = request('imageLocation');

        // save to the database
        $user->save();

        // redirect to home page
        return redirect('/');*/
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
        $user = User::findOrFail($id);
        return $user;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('User.edit', compact('user'));
    }

    public function editpassword($id)
    {
        $user = User::findOrFail($id);
        return view('User.editpassword', compact('user'));
    }

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
            'Phone' => 'required|regex:/^0[0-8]\d{8}$/',
            'ZIP' => 'required|regex:/^[0-9]\d{3}$/',
            //'password' => 'required|min:6|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\X])(?=.*[!@$#%^&*?]).*$/|confirmed',
        ]);
        $user = User::findOrFail($id);
       
        $user->update($request->all());
        return redirect('/mydetails/{username}');
    }

    public function updatepassword(Request $request, $id)
    {
        $this->validate($request, [
            //'name' => 'required|max:255',
            //'email' => 'required|email|max:255|unique:users',
           // 'birth' => 'required|date_format:"d/m/Y"|before_or_equal:-13 years|after_or_equal:-80 years',
           // 'Phone' => 'required|regex:/^0[0-8]\d{8}$/',
            //'ZIP' => 'required|regex:/^[0-9]\d{3}$/',
            'password' => 'required|min:6|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\X])(?=.*[!@$#%^&*?]).*$/|confirmed',
        ]);
      
        $user = User::findOrFail($id);
       
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
