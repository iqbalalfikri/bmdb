<?php

namespace App\Http\Controllers;

use App\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /**
         * Menampilkan 10 genre disetiap page
         */
        $genres = Genre::paginate(10);

        return view('manage_genre')->with(compact('genres'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('add_genre');
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
         * Validasi form input untuk nama genre
         * harus diisi
         */
        $request->validate([
            'name' => 'required'
        ]);

        /**
         * Menyimpan genre ke dalam Database
         * lalu kembali ke halaman manage-genre
         * dengan pesan berhasil menambahkan genre
         */
        $genre = new Genre();
        $genre->name = $request->name;
        $genre->save();

        return redirect(route('manage-genre'))->with('status', 'Berhasil menambahkan genre !');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function edit(Genre $genre)
    {
        /**
         * Mengambil data genre berdasarkan id genre
         * lalu redirect ke halaman edit genre
         * dengan mengirimkan data tersebut
         */
        $genre = Genre::find($genre->id);
        return view('edit_genre', compact('genre'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Genre $genre)
    {
        /**
         * Validasi form nama genre
         * harus diisi
         */
        $request->validate(['name' => 'required']);

        /**
         * Update nama genre setelah berhasil divalidasi
         * lalu redirect ke halaman manage-genre
         * dengan pesan berhasil di update
         */
        Genre::where('id', $genre->id)->update([
            'name' => $request->name
        ]);

        return redirect(route('manage-genre'))->with('status', 'Berhasil update genre !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function destroy(Genre $genre)
    {
        /**
         * Menghapus data genre berdasarkan id
         * lalu redirect ke halaman yang sama
         * dengan pesan berhasil di hapus
         */
        Genre::find($genre->id)->delete();

        return back()->with('status', 'Genre berhasil dihapuskan !');
    }
}
