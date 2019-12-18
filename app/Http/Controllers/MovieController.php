<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Genre;
use App\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /**
         * Mengambil 10 data movie per page
         * Redirect ke halaman manage_movie dengan mengirimkan data tersebut
         */
        $movies = Movie::paginate(10);

        return view('manage_movie')->with(compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /**
         * Mengambil data semua genre yang ada dari Database untuk digunakan di halaman add_movie
         * redirect ke halaman add_movie dengan mengirimkan data tersebut
         */
        $genres = Genre::all();
        return view('add_movie', compact('genres'));
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
         * semua form input harus diisi
         * rating harus berupa angka dengan range 0 sampai 10
         * upload harus memiliki ekstension .jpg atau .jpeg atau .png
         */
        $request->validate([
            'title' => 'required',
            'genre' => 'required',
            'description' => 'required',
            'rating' => 'required | numeric | min:0 | max:10',
            'upload' => 'required | mimes:jpg,jpeg,png'
        ]);

        /**
         * Menyimpan data gambar (upload) ke folder storage/app/public/movies
         * dengan nama file yang digenerate menggunakan uniqid
         */
        $filename = uniqid() . '.' . $request->upload->getClientOriginalExtension();
        $request->upload->move(storage_path('app\public\movies'), $filename);


        /**
         * Menyimpan data movie yang telah di validasi ke Database
         * field posted_by diambil dari nama admin yang sedang log in
         * redirect ke halaman manage-movie dengan pesan berhasil
         */
        $movie = new Movie();

        $movie->title = $request->title;
        $movie->genre_id = $request->genre;
        $movie->description = $request->description;
        $movie->rating = $request->rating;
        $movie->picture = $filename;
        $movie->posted_by = auth()->user()->name;

        $movie->save();

        return redirect(route('manage-movie'))->with('status', 'Berhasil menambahkan movie !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        /**
         * Mengambil 1 data movie berdasarkan id
         * Mengambil seluruh data comment berdasarkan movie_id
         * redirect ke halaman detail dengan mengirimkan semua data tersebut
         */
        $movie = Movie::where('id', $id)->firstOrFail();
        $comments = Comment::where('movie_id', $id)->get();


        return view('detail')->with(compact('movie', 'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function edit(Movie $movie)
    {
        /**
         * Mengambil semua data genre
         * Mengambil data movie berdasarkan id
         * Redirect ke halaman edit movie dan mengirimkan semua data tersebut
         */
        $genres = Genre::all();
        $movie = Movie::where('id', $movie->id)->firstOrFail();
        return view('edit_movie')->with(compact('genres', 'movie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movie $movie)
    {

        /**
         * Validasi form input
         * semua form data harus diisi
         * rating harus berupa angka dengan range 0 sampai 10
         * extension upload picture harus berupa jpg atau jpeg atau png
         */
        $request->validate([
            'title' => 'required',
            'genre' => 'required',
            'description' => 'required',
            'rating' => 'required | numeric | min:0 | max:10',
            'upload' => 'required | mimes:jpg,jpeg,png'
        ]);

        /**
         * Menyimpan upload picture ke folder storage/app/public/movies
         * dengan nama file yang digenerate menggunakan uniqid
         */
        $filename = uniqid() . '.' . $request->upload->getClientOriginalExtension();
        $request->upload->move(storage_path('app\public\movies'), $filename);

        /**
         * Meng-update data movie berdasarkan id
         * redirect ke halaman manage-movie dengan pesan berhasil
         * posted_by berubah sesuai dengan id admin yang merubahnya
         */
        Movie::where('id', $movie->id)->update([
            'title' => $request->title,
            'genre_id' => $request->genre,
            'description' => $request->description,
            'rating' => $request->rating,
            'picture' => $filename,
            'posted_by' => auth()->user()->id
        ]);

        return redirect(route('manage-movie'))->with('status', 'Berhasil update movie !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movie $movie)
    {
        /**
         * Menghapus data movie berdasarkan id movie yang dipilih
         * Redirect ke halaman yang sama dengan pesan berhasil
         */
        Movie::find($movie->id)->delete();

        return back()->with('status', 'Movie berhasil dihapuskan !');
    }
}
