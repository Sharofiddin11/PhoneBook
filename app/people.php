<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class people extends Model
{
    protected $fillable = ['name', 'phone_number', 'email', 'address', 'Dep_name', 'otd_name'];
}
