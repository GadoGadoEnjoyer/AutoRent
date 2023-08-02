<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Car;
use App\Models\Diskon;
use Illuminate\Support\Facades\Redis;

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
        $diskonlist = Diskon::get();
        return view('admin',['users' => $users,'banneduser' => $banneduser,'diskonlist' => $diskonlist]);
    }
    function deletediskon(Diskon $diskon){
        $diskon->delete();
        return redirect('/admin');
    }
    function bukabuatdiskon(){
        return view('buatdiskon');
    }
    function buatdiskon(Request $request){
        $validated = $request->validate([
            'nama_diskon' => 'required',
            'jumlah_diskon' => 'required|digits_between:1,3'
        ]);
        Diskon::create([
            'nama_diskon' => $validated['nama_diskon'],
            'jumlah_diskon' => $validated['jumlah_diskon']
        ]);
        return redirect('/admin');
    }
    function editdiskon(Request $request, Diskon $diskon){
        $validated = $request->validate([
            'nama_diskon' => 'required',
            'jumlah_diskon' => 'required|digits_between:1,3'
        ]);
        $diskon->update([
            'nama_diskon' => $validated['nama_diskon'],
            'jumlah_diskon' => $validated['jumlah_diskon']
        ]);
        return redirect('/admin');
    }
    function cekdiskon(Request $request, Car $car){
        $valid = Diskon::where('nama_diskon',$request->nama_diskon)->first();
        if($valid != null){
            return redirect('/rentcar/'.$car->id)->with('diskon', $valid);
        }
        else{
            return redirect('/rentcar/'.$car->id);
        }
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
