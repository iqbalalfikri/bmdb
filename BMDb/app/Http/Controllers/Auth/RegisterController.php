<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Storage;

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
    protected $redirectTo = '/login';

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
        /**
         * validasi input register user
         */
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed', 'alpha_num'],
            'gender' => 'required',
            'address' => 'required',
            'dob' => ['required', 'date'],
            'upload' => ['required', 'mimes:jpeg,jpg,png']
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

        /**
         * menyimpan gambar di folder storage/app/public/users
         * dengan nama file yang digenerate menggunakan uniqid
         */

        $filename = uniqid() . '.' . $data['upload']->getClientOriginalExtension();
        $data['upload']->move(storage_path('app\public'), $filename);


        /**
         * menyimpan data user yang telah divalidasi ke dalam database
         * password di Hash, dan picture disimpan menggunakan
         * nama file yang telah dibuat sebelumnya
         */
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'gender' => $data['gender'],
            'address' => $data['address'],
            'dob' => $data['dob'],
            'picture' => $filename
        ]);
    }
}
