<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'quotes';

    public function user(){
        return $this->belongsTo('App\User');
    }
}
