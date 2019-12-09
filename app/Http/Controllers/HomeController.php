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
        $movies = Movie::paginate(1);

        return view('home')->with(compact('movies'));
    }

    public function search(Request $request)
    {
        $query = $request->input('q');


        $movies = Movie::where('title', 'like', "%$query%")
            ->orWhereHas('genres', function ($q) use ($query) {
                $q->where('name', 'like', "%$query%");
            })
            ->paginate(1);

        $movies->appends($request->only('q'));



        return view('home')->with(compact('movies'));
    }
}
