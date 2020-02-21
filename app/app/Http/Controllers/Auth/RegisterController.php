<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
    protected $redirectTo = RouteServiceProvider::HOME;

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
        $messages = [
            'name.required' => 'You must choose a username',
            'name.string' => 'That username doesn\'t look right...',
            'name.max' => 'Your username is too long. (255 max characters)',
            'name.unique' => 'That username is not available.',
            'email.required' => 'You need to enter an email address.',
            'email.string' => 'That email doesn\'t look right...',
            'email.max' => 'Your email address is too long. (255 max characters)',
            'email.unique' => 'That email address is unavailable.',
            'password.required' => 'A password is required.',
            'password.string' => 'That password doesn\'t look right...',
            'password.min' => 'Password must be at least 8 characters long',
            'password.confirmed' => 'Your password did not match.',
            'checkLegal.required' => 'You must agree to the Terms and Policies.',
            'checkPassword.requried' => 'You must specify that you did not use your RuneScape password..'
        ];
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'checkLegal' => ['required'],
            'checkPassword' => ['required'],
        ], $messages);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
