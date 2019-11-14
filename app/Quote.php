<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{

    protected $fillable = ['_token'];

    public function order(){
        return $this->belongsTo('App\Order');
    }
}
