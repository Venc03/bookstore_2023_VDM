<?php

namespace App\Http\Controllers;

use App\Models\Copy;
use Illuminate\Http\Request;

class CopyController extends Controller
{
    public function index(){
        $copy = response()->json(Copy::all());
        return $copy;
    }

    public function show($copy_id){
        $copy = response()->json(Copy::find($copy_id));
        return $copy;
    }

    public function destroy($copy_id){
        Copy::find($copy_id)->delete();
    }

    public function store(Request $request){

        $copy = new Copy();
        $copy->hardcover = $request->hardcover;
        $copy->publication = $request->publication;
        $copy->status = $request->status;
        $copy->book_id = $request->book_id;
        $copy->save();
    }


    /* VIEW FUGGVENYEK */

    public function newView(){
        $copy = Copy::all();
        return view('copy.new', ['copy' => $copy]);
    }

    public function editView($copy_id){
        $copy = Copy::find($copy_id);
        return view('copy.edit', ['copy' => $copy]);
    }

    public function listView(){
        $copys = Copy::all();
        return view('copy.list', ['copys' => $copys]);
    }
}
