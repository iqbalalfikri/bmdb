<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $movies = Movie::paginate(10);

        return view('home')->with(compact('movies'));
    }

    public function search(Request $request)
    {
        $query = $request->input('q');

        $movies = Movie::where('title', 'like', "%$query%")
            ->whereHas('genre_id', function ($query) {
                $query->where('genre', '=', \Request::input('type'));
            })
            ->paginate(10);

        $movies->appends($request->only('q'));

        return view('home')->with(compact('movies'));
    }
}
