<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Car;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller
{
    //Create
    function registerCar(Request $request){
        $validated = $request->validate([
            'model' => 'required',
            'user_id' => 'required',
            'color' => 'required',
            'price' => 'required',
            'Imagelink' => 'nullable'
        ]);
        
        if(isset($validated['Imagelink'])){
            $file = $request->file('Imagelink');
            $newFilename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            Storage::disk('public')->put($newFilename, file_get_contents($file));
        }
        else{
            $newFilename = null;
        }    

        Car::create([
            'model' => $validated['model'],
            'user_id' => $validated['user_id'],
            'color' => $validated['color'],
            'price' => $validated['price'],
            'Imagelink' => $newFilename
        ]);
        return redirect('/carlist');
    }
    //Read
    function bukaregisterCar(){
        $username = Auth::user()->name;
        $userid = Auth::user()->id;
        return view('registercar',['username'=>$username,'userid'=>$userid]);
    }
    function carlist(){
        $cars = Car::where('isRented',0)->where('user_id', '<>',Auth::user()->id)->get();
        return view('carlist',['cars'=>$cars]);
    }
    function bukarentCar(Car $car){
        if($car->user_id == Auth::user()->id || $car->isRented == 1){
            return redirect('/carlist');
        }
        return view('rentcar',['car'=>$car]);
    }
    //Update
    function rentcar(Request $request, Car $car){
        $validated = $request->validate([
            'rentLimit' => 'required',
        ]);
        $car->update([
            'isRented' => 1,
            'Renter' => Auth::user()->id,
            'rentLimit' => $validated['rentLimit']
        ]);
        return redirect('/carlist');
    }

    function returncar(Request $request, Car $car){
        $now = date("Y-m-d");
        if($now > $car->rentLimit){
            return redirect('/denda/'.$car->id);
        }
        $car->update([
            'isRented' => 0,
            'Renter' => null,
            'rentLimit' => null
        ]);
        return redirect('/carlist');
    }

    function bukadenda(Car $car){

        $now = Carbon::now();
        $carlimit = Carbon::parse($car->rentLimit);
        $besardenda = $now->diffInDays($carlimit);
        //This is needlessly complicated and I hate this.
        //NVM CARBON GOD BLESS YOU
        return view('denda',['car'=>$car,'now'=>$now,'besardenda'=>$besardenda]);
    }

    function denda(Car $car){
        $user = User::find($car->RenterUser->id);
        $user->update([
            'isBanned' => 1,
        ]);
        $car->update([
            'isRented' => 0,
            'Renter' => null,
            'rentLimit' => null
        ]);


        return redirect('/');
    }
}
