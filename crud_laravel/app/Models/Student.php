<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $tabl='student';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name', 'phone', 'email', 'address', 'gender', 'dob', 'password',
    ];
}
