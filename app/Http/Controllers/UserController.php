<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //Create
    function register(Request $request){
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);
        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password'])
        ]);
        return redirect('/');
    }

    //Read
    function welcome(){
        if(Auth::user()){
            return view('welcome',['loggedin' => 'True']);
        }
        else{
            return view('welcome',['loggedin' => 'False']);
        }
    }
    function bukaRegister(){
        return view('register');
    }
    function bukaLogin(){
        return view('login');
    }
    function logout(){
        Auth::logout();
        return redirect('/');
    }
    function admin(){
        $users = User::get();
        return view('admin',['users' => $users]);
    }
    function login(Request $request){
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        if(Auth::attempt($validated)){
            return redirect('/carlist');
        }
        return redirect('/');
    }
    function bukaupdateuser(User $user){
        return view('updateuser',['user' => $user]);
    }

    function bukaprofile(User $user){
        $userlist = User::get();
        return view('profile',['user'=>$user,'userlist'=>$userlist]);
    }
    //Update
    function updateuser(Request $request, User $user){
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);
        $user->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
        ]);
        return redirect('/admin');
    }

    //Delete
    function deleteuser(User $user){
        $user->delete();
        return redirect('/admin');
    }
    
}
