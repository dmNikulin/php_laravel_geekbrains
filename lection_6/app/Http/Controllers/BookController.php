<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\ValidationExeption;

class BookController extends Controller
{
    //
    public function index() {
        return view('form');
    }

    public function store(Request $request)
    {   
        $request->validate([
            'title' => ['required', 'unique:books,title', 'max:100'],
            'author' => ['required', 'unique:books,author', 'max:255']
        ]);

        $book = new Book($request->all()); //зависит от имени поля в верстке
        $book->save();

        // или
        // $book = new Book();
        // $book->title = $request->title;
        // $book->author = $request->author;
        // $book->genre = $request->genre;
        // $book->save();
        
        return Redirect::route('show-form');
    }
}
