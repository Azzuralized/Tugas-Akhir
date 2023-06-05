<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'students';

    protected $fillable = [
        'name', 'email', 'date_of_birth', 'enrollment_date',
    ];
}
