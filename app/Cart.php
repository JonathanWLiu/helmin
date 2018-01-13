<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{

    protected $fillable = [
        'userId','productId','quantity','totalPrice',
    ];

    protected $table = 'carts';

    public function user(){
        return $this->belongsTo('App\User','userId');
    }

    public function product(){
        return  $this->belongsTo('App\Product','productId');
    }
}
