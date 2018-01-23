<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Counterparty extends Model
{
    protected $fillable = [
            'type',
            'name',
            'phone',
            'email'
        ];
}
