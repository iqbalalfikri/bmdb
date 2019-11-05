<?php

namespace App\Http\Controllers;

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
        $movies = Movie::all();

        return view('manage_movie')->with(compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        $request->validate([
            'title' => 'required',
            'genre' => 'required',
            'description' => 'required',
            'rating' => 'numeric | min:0 | max:10',
            'upload' => 'required | mimes:jpg,jpeg,png'
        ]);

        $filename = uniqid() . '.' . $request->upload->getClientOriginalExtension();
        $request->upload->move(storage_path('app\public'), $filename);


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
        $movie = Movie::where('id', $id)->firstOrFail();

        return view('detail')->with(compact('movie'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function edit(Movie $movie)
    {
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
        $request->validate([
            'title' => 'required',
            'genre' => 'required',
            'description' => 'required',
            'rating' => 'numeric | min:0 | max:10',
            'upload' => 'required | mimes:jpg,jpeg,png'
        ]);

        $filename = uniqid() . '.' . $request->upload->getClientOriginalExtension();
        $request->upload->move(storage_path('app\public'), $filename);

        Movie::where('id', $movie->id)->update([
            'title' => $request->title,
            'genre_id' => $request->genre,
            'description' => $request->description,
            'rating' => $request->rating,
            'picture' => $filename
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
        Movie::find($movie->id)->delete();

        return back()->with('status', 'Movie berhasil dihapuskan !');
    }
}
