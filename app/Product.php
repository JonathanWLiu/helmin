<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name','typeId','price','img'
    ];

    protected $table = 'products';
    public $timestamps = false;

    public function Type(){
        return $this->belongsTo('App\Type');
    }

    public function Cart(){
        $this->hasOne('App\Cart');
    }

    public function Transaction(){
        $this->hasOne('App\Transaction');
    }
}
