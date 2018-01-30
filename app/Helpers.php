<?php

namespace App;

use App\Product;
use App\Counterpaty;
use DB;

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

            $arrProduct[$product['counterpaty']['id']][] = [
                'idProduct'    => $product['id'],
                'nameProduct'  => $product['name'],
                'priceProduct' => $product['price'],
                'countProduct' => $countProduct
            ];
        }

        return $arrProduct;
    }

    static public function handlerOrderProviders($dataProviders)
    {
        $products = Product::whereIn('id', $dataProviders['idProduct'])
            ->get(['id', 'id_counterpaty', 'price'])
            ->toArray();
        $groupOrders = self::groupOrderProvider($products, $dataProviders['countProduct']);

        foreach($groupOrders as $keyOrder => $valOrder) {
            $count = 0;
            unset($resPrice);
            foreach($valOrder as $keyProduc => $valProduc) {
               $resPrice[$keyProduc] = $valProduc['count'] * $valProduc['price'];
               $count += $valProduc['count'];
            }

            $orders[] = [
                'id_counterpaty' => $keyOrder,
                'products'       => serialize($valOrder),
                'count'          => $count,
                'price'          => array_sum($resPrice)
            ];
        }

        return $orders;

    }

    static protected function groupOrderProvider($products, $countProudcts)
    {
        foreach($products as $key => $product) {
            $orders[$product['id_counterpaty']][$product['id']] = [
                    'count' => (int) $countProudcts[$key],
                    'price' => $product['price']
            ];
        }

        return $orders;
    }
}
