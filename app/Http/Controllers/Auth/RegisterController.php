<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\User;
use App\Http\Controllers\Controller;
use App\Vocation;
use App\Rules\ReservedWords;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm()
    {
        $vocations = Vocation::all();

        return view('auth.register', compact('vocations'));
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
            'name' => ['required', 'string', 'max:255'],
            'email' => 'required|string|email|max:255|unique:users',
            'nickname' => ['required', 'string', 'min:2', 'max:20', 'unique:users', new ReservedWords],
            'password' => 'required|string|min:6|confirmed',
            'vocation_id' => 'required|exists:vocations,id',
            'gender' => 'required|in:1,2',
        ]);
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
            'nickname' => $data['nickname'],
            'vocation_id' => $data['vocation_id'],
            'gender' => $data['gender'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
