<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{

    use HasFactory, Notifiable;



    protected $fillable = [
        'name',
        'email',
        'contact',
        'password'
    ];
        public function addresses()
    {
        return $this->hasMany(Address::class);
    }

}
