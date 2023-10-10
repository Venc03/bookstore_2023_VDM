<?php

namespace App\Http\Controllers;

use App\Models\Lending;
use Illuminate\Http\Request;

class LendingController extends Controller
{
    public function index(){
        return Lending::all();
    }

    public function show ($user_id, $copy_id, $start)
    {
        $lending = Lending::where('user_id', $user_id)->where('copy_id', $copy_id)->where('start', $start)->get();
        return $lending[0];
    }


    public function destroy($user_id, $copy_id, $start){
        return LendingController::show($user_id, $copy_id, $start);
    }

    public function store(Request $request){

        $lending = new Lending();
        $lending->user_id = $request->user_id;
        $lending->copy_id = $request->copy_id;
        $lending->start = $request->start;
        $lending->save();
    }


    /* VIEW FUGGVENYEK */

    public function newView(){
        $lending = Lending::all();
        return view('lending.new', ['lending' => $lending]);
    }

    public function editView($id){
        $lending = Lending::find($id);
        return view('lending.edit', ['lending' => $lending]);
    }

    public function listView(){
        $lendings = Lending::all();
        return view('lending.list', ['lendings' => $lendings]);
    }
}
