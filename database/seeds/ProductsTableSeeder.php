<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'id_counterpaty' => 1,
            'name'           => 'product1',
            'price'          => 100
        ]);

        Product::create([
            'id_counterpaty' => 1,
            'name'           => 'product2',
            'price'          => 200
        ]);

        Product::create([
            'id_counterpaty' => 1,
            'name'           => 'product3',
            'price'          => 300
        ]);

        Product::create([
            'id_counterpaty' => 4,
            'name'           => 'product4',
            'price'          => 150
        ]);

        Product::create([
            'id_counterpaty' => 4,
            'name'           => 'product5',
            'price'          => 250
        ]);

        Product::create([
            'id_counterpaty' => 1,
            'name'           => 'product6',
            'price'          => 400
        ]);

        Product::create([
            'id_counterpaty' => 4,
            'name'           => 'product7',
            'price'          => 200
        ]);

        Product::create([
            'id_counterpaty' => 4,
            'name'           => 'product8',
            'price'          => 500
        ]);

        Product::create([
            'id_counterpaty' => 4,
            'name'           => 'product9',
            'price'          => 1000
        ]);

        Product::create([
            'id_counterpaty' => 1,
            'name'           => 'product10',
            'price'          => 100
        ]);

        Product::create([
            'id_counterpaty' => 1,
            'name'           => 'product11',
            'price'          => 9000
        ]);

        Product::create([
            'id_counterpaty' => 4,
            'name'           => 'product12',
            'price'          => 1000
        ]);
    }
}
