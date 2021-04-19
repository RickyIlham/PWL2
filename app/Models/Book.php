<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'penulis',
        'tahun',
        'penerbit'
    ];

    public static function getDataBooks(){
        $books = Book::all();
        $books_filter = [];
        $no = 1;
        for($i=0; $i < $books->count(); $i++){
            $books_filter[$i] = $no++;
            $books_filter[$i] = $books[$i]->judul;
            $books_filter[$i] = $books[$i]->penulis;
            $books_filter[$i] = $books[$i]->tahun;
            $books_filter[$i] = $books[$i]->penerbit;

        }
        return $books_filter;
    }
}
