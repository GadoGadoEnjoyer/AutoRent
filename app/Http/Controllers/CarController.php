<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Car;

class CarController extends Controller
{
    //Create
    function registerCar(Request $request){
        $validated = $request->validate([
            'model' => 'required',
            'user_id' => 'required',
            'color' => 'required',
            'price' => 'required',
        ]);
        Car::create([
            'model' => $validated['model'],
            'user_id' => $validated['user_id'],
            'color' => $validated['color'],
            'price' => $validated['price'],
           
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
        $cars = Car::get();
        return view('carlist',['cars'=>$cars]);
    }
    function bukarentCar(Car $car){
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
}
