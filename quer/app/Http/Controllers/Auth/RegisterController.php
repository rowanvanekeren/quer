<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;

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
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

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
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'username' => 'required|max:255|unique:users',
            'country' => 'required|max:255',
            'city' => 'required|max:255',
            'postal_code' => 'required|max:255',
            'street' => 'required|max:255',
            'house_number' => 'required|max:255',
            'phone_number' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'image' => 'required'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
     $path= "no image";

        //user is active by default
        $active = 1;
        
        if(isset($data['image']))
        {
            $destinationPath =  base_path() . "/public/images/profiles";
            $ext = pathinfo($data['image']->getClientOriginalName(), PATHINFO_EXTENSION);
            $imageName = date('d-m-Y') . '_' . $data['username'] . '.' . $ext;
            $data['image']->move($destinationPath, $imageName);
            $path = $imageName;
        }

        return User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'username' => $data['username'],
            'country' => $data['country'],
            'city' => $data['city'],
            'postal_code' => $data['postal_code'],
            'street' => $data['street'],
            'house_number' => $data['house_number'],
            'phone_number' => $data['phone_number'],
            'is_admin' => 0,
            'active' => 1,
            'image' => $path,
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }



}
