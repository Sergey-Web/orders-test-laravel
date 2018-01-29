<?php

namespace App;

use App\Product;
use App\Counterpaty;

use Illuminate\Database\Eloquent\Model;

class Helpers extends Model
{
    static public function getProductStorage($products)
    {
        foreach($products as $product) {
            if($product['storage']) {
                $lastOrder = count($product['storage']) - 1;
                $countProduct = $product['storage'][$lastOrder]['count'] > 0 ? 
                    $product['storage'][$lastOrder]['count'] : 0;
            } else {
                $countProduct = 0;
            }

            $arrProduct[] = [
                'idProduct'    => $product['id'],
                'nameProduct'  => $product['name'],
                'priceProduct' => $product['price'],
                'countProduct' => $countProduct
            ];
        }

        return $arrProduct;
    }
}
