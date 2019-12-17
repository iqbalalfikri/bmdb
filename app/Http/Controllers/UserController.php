<?php

namespace App\Http\Controllers;

use App\Roles;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /**
         * Mengambil 10 data user per page
         * redirect ke halaman manage_user dengan mengirimkan data tersebut
         */
        $users = User::paginate(10);

        return view('manage_user')->with(compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /**
         * Mengambil semua data roles yang ada di Database
         * untuk digunakan di form input roles
         * redirect ke halaman add_user dengan mengirimkan data tersebut
         */
        $roles = Roles::all();
        return view('add_user')->with(compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        /**
         * Validasi form input
         * seluruh data harus diisi
         * name, email, password harus berupa string
         * Jumlah string name maksimal 100 
         * Jumlah string email maksimal 255 dan harus unique (tidak boleh yang sudah ada di tabel users)
         * Jumlah string passwrod minimal 6 dan harus alpha numeric
         * dob harus sesuai dengan format date
         * Extension upload picture harus berupa .jpg atau .jpeg atau .png
         */
        $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'role' => 'required',
            'password' => ['required', 'string', 'min:6', 'confirmed', 'alpha_num'],
            'gender' => 'required',
            'address' => 'required',
            'dob' => ['required', 'date'],
            'upload' => ['required', 'mimes:jpeg,jpg,png']
        ]);

        /**
         * upload picture disimpan di folder storage/app/public/movies
         * dengan nama file yang digenerate menggunakan uniqid
         */
        $filename = uniqid() . '.' . $request->upload->getClientOriginalExtension();
        $request->upload->move(storage_path('app\public\movies'), $filename);


        /**
         * Menyimpan data user yang telah diinput ke dalam Database
         * Redirect ke halaman manage-user dengan pesan berhasil
         */
        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->role_id = $request->role;
        $user->password = Hash::make($request->password);
        $user->gender = $request->gender;
        $user->address = $request->address;
        $user->dob = $request->dob;
        $user->picture = $filename;

        $user->save();

        return redirect(route('manage-user'))->with('status', 'Berhasil menambahkan user !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        /**
         * Mengambil 1 data user berdasarkan user id
         * Redirect ke halaman profile dengan mengirimkan data user
         */
        $user = User::where('id', $id)->firstOrFail();;
        return view('profile')->with(compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        /**
         * Mengambil seluruh data dari tabel roles
         * Mengambil 1 data user berdasarkan id
         * Menyimpan url sebelumnya ke sebuah variable
         */
        $roles = Roles::all();
        $user = User::where('id', $id)->firstOrFail();
        $previousUrl = url()->previous();

        /**
         * Mengecek previous url, dari profile atau manage-user
         * Assign value baru untuk previousUrl (profile/manage)
         * Redirect ke halaman edit_user dengan data-data tersebut
         */
        if (strpos($previousUrl, 'profile')) {
            $previousUrl = 'profile';
        } else $previousUrl = 'manage';

        return view('edit_user')->with(compact('user', 'roles', 'previousUrl'));
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
        /**
         * Validasi form input
         * seluruh data harus diisi
         * name, email, password harus berupa string
         * Jumlah string name maksimal 100 
         * Jumlah string email maksimal 255 dan harus unique (tidak boleh yang sudah ada di tabel users)
         * Jumlah string passwrod minimal 6 dan harus alpha numeric
         * dob harus sesuai dengan format date
         * Extension upload picture harus berupa .jpg atau .jpeg atau .png
         */
        $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,id'],
            'role' => 'required',
            'password' => ['required', 'string', 'min:6', 'confirmed', 'alpha_num'],
            'gender' => 'required',
            'address' => 'required',
            'dob' => ['required', 'date'],
            'upload' => ['required', 'mimes:jpeg,jpg,png']
        ]);


        /**
         * Menyimpan data user yang telah diinput ke dalam Database
         * Redirect ke halaman manage-user dengan pesan berhasil
         */

        $filename = uniqid() . '.' . $request->upload->getClientOriginalExtension();
        $request->upload->move(storage_path('app\public'), $filename);


        /**
         * Update data user berdasarkan id ke Database
         */
        User::where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'role_id' => $request->role,
            'password' => Hash::make($request->password),
            'gender' => $request->gender,
            'address' => $request->address,
            'dob' => $request->dob,
            'picture' => $filename
        ]);

        /**
         * Mengecek apakah previousUrl yang dikirimkan profile atau manage
         * Jika profile, redirect ke halaman profile dengan paramater id
         * Jika manage, redirect ke halaman manage-user
         * dengan pesan berhasil
         */
        if ($request->previousUrl == 'profile')
            return redirect(route('profile', $id))->with('status', 'Berhasil update profile');

        return redirect(route('manage-user'))->with('status', 'Berhasil update user !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        /**
         * Menghapus data user berdasarkan id
         * dengan pesan berhasil
         */
        User::find($id)->delete();
        return back()->with('status', 'Data User Berhasil Dihapus!');
    }
}
