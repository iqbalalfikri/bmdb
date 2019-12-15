<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;

class HomeController extends Controller
{

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
            ->orWhereHas('genres', function ($q) use ($query) {
                $q->where('name', 'like', "%$query%");
            })
            ->paginate(10);

        $movies->appends($request->only('q'));



        return view('home')->with(compact('movies'));
    }
}
