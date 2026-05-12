<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public $timestamps = false;
    public function cart(){
        return $this->hasMany('App\Models\Cart');
    }

    public function repairs(){
        return $this->hasMany('App\Models\Repair');
    }
    
}
