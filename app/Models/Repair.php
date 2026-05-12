<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Repair extends Model
{

    public $timestamps = false;     

    protected $fillable = [
        'status', 
        'description', 
        'start_date', 
        'estimated_completion', 
        'user_id'
    ];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
