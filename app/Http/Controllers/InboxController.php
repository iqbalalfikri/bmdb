<?php

namespace App\Http\Controllers;

use App\Inbox;
use Illuminate\Http\Request;

class InboxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /**
         * Mengambil data 10 pesan per page yang diambil berdasarkan receiver_id
         * yang didapat dari user id yang sedang log in
         * diurutkan berdasarkan pesan dibuat dan secara descending
         * lalu redirect ke halaman inbox dengan mengirimkan data tersebut
         */
        $inboxes = Inbox::where('receiver_id', auth()->user()->id)->orderBy('created_at', 'desc')->paginate(10);


        return view('inbox')->with(compact('inboxes'));
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
         * Validasi form untuk mengirim pesan
         * harus diisi
         */
        $request->validate([
            'message' => 'required'
        ]);

        /**
         * Menyimpan data pesan
         * sender_id didapat dari user id yang sedang log in
         * lalu redirect ke halaman yang sama dengan pesan berhasil
         */
        $inbox = new Inbox();

        $inbox->sender_id = auth()->user()->id;
        $inbox->receiver_id = $request->receiver;
        $inbox->message = $request->message;

        $inbox->save();

        return back()->with('status', 'Berhasil mengirimkan pesan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Inbox::find($id)->delete();

        return back()->with('Pesan berhasil dihapus');
    }
}
