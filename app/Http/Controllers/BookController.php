<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;

class BookController extends Controller
{
    public function create(Request $request)
    {
        $books = new Book();
        $books->title = $request->input('title');
        $books->description = $request->input('description');

        $books->save();
        return response()->json($books);

    }

    public function getBooks(Book $books)
    {
        $books = Book::all();
        return response()->json($books);

    }


}
