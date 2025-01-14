<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        $user = response()->json(User::all());
        return $user;
    }

    public function show($id){
        $user = response()->json(User::find($id));
        return $user;
    }

    public function destroy($id){
        User::find($id)->delete();
    }

    public function store(Request $request){

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->permission = $request->permission;
        $user->status = $request->status;
        $user->save();
    }

    public function update(Request $request, $id){

        $user = User::find($id);
        $user->author = $request->author;
        $user->title = $request->title;
        $user->pieces = $request->pieces;
        $user->save();
    }


    /* VIEW FUGGVENYEK */

    public function newView(){
        $user = User::all();
        return view('user.new', ['user' => $user]);
    }

    public function editView($id){
        $user = User::find($id);
        return view('user.edit', ['user' => $user]);
    }

    public function listView(){
        $users = User::all();
        return view('user.list', ['users' => $users]);
    }
}
