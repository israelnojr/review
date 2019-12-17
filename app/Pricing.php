<?php

namespace App;

use App\Pricing;
use Illuminate\Database\Eloquent\Model;

class Pricing extends Model
{
    protected $fillable = [
        'service_name',
        'price',
        'status'
    ]; 
    
    public function order()
    {
        return $this->blongsTo('App\Order');
    }
}
