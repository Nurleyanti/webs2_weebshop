<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //public $timestamps = false;

    protected $fillable = ['imageurl', 'name', 'description', 'price'];


}
