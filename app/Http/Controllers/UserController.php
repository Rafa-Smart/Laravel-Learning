<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function index(Request $request){
        $nama = $request->input('nama');
        if($nama){
            $users = User::where('name', 'like', '%'.$nama.'%')->get();}
        $users = User::orderBy('id','desc')->paginate(4);
        return view('users.user', ["users" => $users]);
    }

    public function add(){
        return view('users.user-add');
    }

    public function create(Request $request){
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
        ]);

        User::create($request->all());
        Session::flash("message", "New user has been added!");

        // redirec tuh nama routingnya ya, bukan file
        return redirect('users');
    }

    public function detail($id){
        $user = User::find($id);
        return view('users.user-detail', ['user' => $user]);
    }

    public function edit($id){
        $user = User::find($id);
        return view('users.user-edit', ['user' => $user]);
    }

    public function update($id, Request $request){
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email,'.$id,
            // unique:users,email,'.$id ini artinya email harus unik di tabel users
            // kecuali untuk user dengan id yang sedang diupdate
            'password' => 'nullable|min:8',
            // nullable itu artinya boleh kosong
            // jadi kalo ga diisi maka password ga akan diupdate
        ]);

        User::where('id',$id)->update($request->only(["name", 'email', 'password']));

        Session::flash("message", "User data has been updated!");
        return redirect('users');
    }

    public function delete($id){
        User::where('id',$id)->delete();
        Session::flash("message", "User data has been deleted!");
        return redirect('users');
    }
}
