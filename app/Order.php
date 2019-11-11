<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function quote(){
        return $this->hasMany('App\Quote');
    }
}
