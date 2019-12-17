<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = []; 

    public function pricing()
    {
        return $this->hasMany('App\Princing');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
