<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $fillable = [
        'name','img'
    ];

    protected $table = 'types';
    public $timestamps = false;

    public function Product(){
        return $this->hasMany('App\Product');
    }
}
