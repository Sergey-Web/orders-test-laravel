<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Counterpaty extends Model
{
    protected $fillable = [
            'type',
            'name',
            'phone',
            'email'
        ];

    public function product()
    {
        return $this->hasOne('App\Product', 'id_counterpaty', 'id');
    }
}
