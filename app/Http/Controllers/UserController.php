<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Car;

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
        $banneduser = User::where('isBanned',1)->get();
        return view('admin',['users' => $users,'banneduser' => $banneduser]);
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
        $cars = Car::where('renter',$user->id)->get();
        $now = date("Y-m-d");
        $isUser = false;
        if(Auth::user()->id == $user->id){
            $isUser = true;
        }

        return view('profile',['user'=>$user,'userlist'=>$userlist,'cars'=>$cars,'now'=>$now,'isUser'=>$isUser]);
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
    function unbanuser(User $user){
        $user->update([
            'isBanned' => 0
        ]);
        return redirect('/admin');
    }

    //Delete
    function deleteuser(User $user){
        $user->delete();
        return redirect('/admin');
    }
}
