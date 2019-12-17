<?php

namespace App\Http\Controllers;

use App\MovieUser;
use Illuminate\Http\Request;

class MovieUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /**
         * Mengambil data movie yang ada di tabel movie_users
         * Berdasarkan user_id dari user yang sedang log in
         * redirect ke halaman saved_movie dengan mengirimkan data tersebut
         */
        $user = auth()->user()->id;

        $movies = MovieUser::where('user_id', $user)->paginate(10);

        return view('saved_movie')->with(compact('movies'));
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
         * Fitur Save Movie untuk user
         * Menyimpan movie_id dan user_id ke dalam Database
         * user id didapat dari user yang sedang log in
         * redirect ke halaman yang sama dengan pesan berhasil
         */
        MovieUser::create([
            'movie_id' => $request->id,
            'user_id' => auth()->user()->id
        ]);

        return back()->with('status', 'Berhasil disimpan');
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
         * Fitur Unsave Movie
         * Menghapus data dari tabel movie_users
         * Berdasarkan user_id dan movie_id
         * Redirect ke halaman yang sama dengan pesan berhasil
         */
        MovieUser::where('user_id', auth()->user()->id)
            ->where('movie_id', $id)->delete();

        return back()->with('status', 'Berhasil di-unsave');
    }
}
