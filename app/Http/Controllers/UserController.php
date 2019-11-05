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
        $users = User::all();

        return view('manage_user')->with(compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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

        $filename = uniqid() . '.' . $request->upload->getClientOriginalExtension();
        $request->upload->move(storage_path('app\public'), $filename);

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
        $user = User::where('id', $id)->firstOrFail();

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
        $roles = Roles::all();
        $user = User::where('id', $id)->firstOrFail();

        return view('edit_user')->with(compact('user', 'roles'));
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

        $filename = uniqid() . '.' . $request->upload->getClientOriginalExtension();
        $request->upload->move(storage_path('app\public'), $filename);

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
        User::find($id)->delete();
        return back()->with('status', 'Data User Berhasil Dihapus!');
    }
}
