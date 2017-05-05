<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use App\UserCategoriesList;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Category;
use Auth;
use Session;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */

    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */

//<<<<<<< HEAD
//    // protected $dt = new Carbon\Carbon();
//    //protected $before = $dt->subYears(13);
//=======

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'birth' => 'required|date_format:"d/m/Y"|before_or_equal:-13 years|after_or_equal:-80 years',
            'phone' => 'required|regex:/^0[0-8]\d{8}$/',
            'zip' => 'required|regex:/^[0-9]\d{3}$/',
            'password' => 'required|min:6|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\X])(?=.*[!@$#%^&*?]).*$/|confirmed',
            'category_1' => 'different:category_2|different:category_3',
            'category_2' => 'different:category_1|different:category_3',
            'category_3' => 'different:category_1|different:category_2'
        ]);
    }

    public function index($id)
    {
         $user = User::whereId($id)->first();
         return view('Auth.register', compact('user'));
    }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */


    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'birth' => $data['birth'],
            'phone' => $data['phone'],
            'address' => $data['address'],
            'city' => $data['city'],
            'state' => $data['state'],
            'zip' => $data['zip'],
            'password' => $data['password'],
        ]);

        $favCategory1 = new UserCategoriesList(['cat_id' => $data['category_1']]);
        $user->categories()->save($favCategory1);

        $favCategory2 = new UserCategoriesList(['cat_id' => $data['category_2']]);
        $user->categories()->save($favCategory2);

        $favCategory3 = new UserCategoriesList(['cat_id' => $data['category_3']]);
        $user->categories()->save($favCategory3);

//        $user->categories()->saveMany([
//            new UserCategoriesList(['cat_id' => $data['category_1']]),
//            new UserCategoriesList(['cat_id' => $data['category_2']]),
//            new UserCategoriesList(['cat_id' => $data['category_3']]),
//        ]);

//        $user->userCats = UserCategoriesList::create([
//            'user_id' => $user->id,
//            'cat_id' => $data['category_id']
//        ]);

        return $user;
    }


    

}
