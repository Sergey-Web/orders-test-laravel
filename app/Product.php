<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Counterpaty;

class Product extends Model
{
    protected $fillable = [
            'name',
            'id_counterpaty',
            'count',
            'price'
        ];

    public function counterpaty()
    {
        return $this->belongsTo('App\Counterpaty', 'id_counterpaty', 'id');
    }

    public function storage()
    {
        return $this->hasMany('App\Storage', 'id_product', 'id');
    }

}
