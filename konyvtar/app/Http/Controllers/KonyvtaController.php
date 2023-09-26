<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class KonyvtaController extends Controller
{
    public function index(){
        $book = response()->json(Book::all());
        return $book;
    }

    public function show($id){
        $book = response()->json(Book::find($id));
        return $book;
    }

    public function destroy($id){
        Book::find($id)->delete();
    }

    public function store(Request $request){

        $book = new Book();
        $book->title = $request->title;
        $book->description = $request->description;
        $book->end_date = $request->end_date;
        $book->user_id = $request->user_id;
        $book->status = $request->status;
        $book->save();
    }

    public function update(Request $request, $id){

        $book = Book::find($id);
        $book->author = $request->author;
        $book->title = $request->title;
        $book->pieces = $request->pieces;
        $book->save();
    }


    /* VIEW FUGGVENYEK */

    public function newView(){
        $book = Book::all();
        return view('book.new', ['book' => $book]);
    }

    public function editView($id){
        $book = Book::find($id);
        return view('book.edit', ['book' => $book]);
    }

    public function listView(){
        $books = Book::all();
        return view('book.list', ['books' => $books]);
    }
}
