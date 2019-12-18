<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /**
         * validasi form untuk comment
         * harus diisi
         */
        $request->validate([
            'comment' => 'required'
        ]);

        /**
         * Menyimpan data comment dari user ke Database dengan menyimpan 
         * user_id, movie_id, beserta comment yang di input oleh user
         * lalu redirect ke halaman yang sama dengan pesan berhasil
         */
        $comment = new Comment();

        $comment->user_id = $request->user_id;
        $comment->movie_id = $request->movie_id;
        $comment->comment = $request->comment;
        $comment->save();

        return back()->with('status', 'Komentar berhasil dibuat');
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
         * Menghapus comment berdasarkan id yang ada di Database
         * lalu redirect ke halaman yang sama dengan pesan berhasil
         */
        Comment::find($id)->delete();

        return back()->with('status', 'Komentar berhasil dihapus');
    }
}
