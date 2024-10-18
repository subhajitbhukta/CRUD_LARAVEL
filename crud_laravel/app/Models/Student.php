<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Student extends Authenticatable
{
    use Notifiable, HasApiTokens;

    protected $table = 'students';
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'name', 'phone', 'email', 'address', 'gender', 'dob', 'password',
    ];
    
    // protected $hidden = [
    //     'password',
    // ];
}
