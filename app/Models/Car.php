<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'model',
        'user_id',
        'color',
        'price',
        'isRented',
        'Renter',
        'rentLimit',
        'Imagelink'
    ];

    function owner():HasOne{
        return $this->HasOne(User::class,'id','user_id');
    }
    function RenterUser():HasOne{
        return $this->HasOne(User::class,'id','Renter');
    }
}
