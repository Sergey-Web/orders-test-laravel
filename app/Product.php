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

    static public function generateData($reqeust) {
        $dataProduct = $reqeust->except('_token');
        $idCounterpaty = Counterpaty::where('name',$dataProduct['counterpaty'])->first()->id;
        unset($dataProduct['counterpaty']);
        $dataProduct['id_counterpaty'] = $idCounterpaty;
        //dd($dataProduct);
        return $dataProduct;
    }
}
