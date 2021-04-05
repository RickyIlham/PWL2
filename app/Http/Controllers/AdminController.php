<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $user = Auth::user();
        return view('home', compact('user'));
    }
    public function books(){
        $user = Auth::user();
        $books = Book::all();
        return view('book', compact('user', 'books'));
    }

    public function submit_books(Request $req){
        $books = new Book;

        $books->judul = $req->get('judul');
        $books->penulis = $req->get('penulis');
        $books->tahun = $req->get('tahun');
        $books->penerbit = $req->get('penerbit');

        if($req->hasFile('cover')){
            $extension =$req->file('cover')->extension();
            $filename = 'cover_buku_'.time().'.'.$extension;
            $req->file('cover')->storeAs(
                'public/cover_buku', $filename
            );
            $books->cover = $filename;
        }

        $books->save();
        $notification = array(
            'message' => 'Data Buku Berhasil Ditambahkan',
            'alert-type' => 'Success'
        );
        return redirect()->route('admin.books')->with($notification);
    }
}
