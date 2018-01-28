<?php

use Illuminate\Database\Seeder;
use App\Order;

class OrdersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Order::create([
            'id_counterpaty' => 4,
            'products'       => serialize([
                    8 => [
                        'count' => 10,
                        'price' => 5000
                    ],
                    9 => [
                        'count' => 100,
                        'price' => 10000
                        ]
                ]),
            'count'          => 110,
            'price'          => 15000,
        ]);

        Order::create([
            'id_counterpaty' => 1,
            'products'       => serialize([
                    1 => [
                        'count' => 100,
                        'price' => 10000
                    ],
                    2 => [
                        'count' => 10,
                        'price' => 2000
                    ]
                ]),
            'count'          => 110,
            'price'          => 10200
        ]);

        Order::create([
            'id_counterpaty' => 4,
            'products'       => serialize([
                9  => [
                    'count' => 20,
                    'price' => 2000
                ],
                12 => [
                    'count' => 2,
                    'price' => 1000
                ]
            ]),
            'count'          => 22,
            'price'          => 3000
        ]);

        Order::create([
            'id_counterpaty' => 2,
            'products'       => serialize([
                    1 => [
                        'count' => 10,
                        'price' => 1000
                    ],
                    2 => [
                        'count' => 1,
                        'price' => 200
                    ]
                ]),
            'count'          => 11,
            'price'          => 1200
        ]);

        Order::create([
            'id_counterpaty' => 3,
            'products'       => serialize([
                    1 => [
                        'count' => 1,
                        'price' => 100
                    ],
                    2 => [
                        'count' => 2,
                        'price' => 400
                    ]
                ]),
            'count'          => 11,
            'price'          => 1200
        ]);

        Order::create([
            'id_counterpaty' => 5,
            'products'       => serialize([
                    2 => [
                        'count' => 3,
                        'price' => 600
                    ]
                ]),
            'count'          => 3,
            'price'          => 600
        ]);

        Order::create([
            'id_counterpaty' => 2,
            'products'       => serialize([
                    8 => [
                        'count' => 2,
                        'price' => 1000
                    ],
                    9 => [
                        'count' => 1,
                        'price' => 200
                    ]
                ]),
            'count'          => 11,
            'price'          => 1200
        ]);

        Order::create([
            'id_counterpaty' => 5,
            'products'       => serialize([
                    8 => [
                        'count' => 1,
                        'price' => 500
                    ]
                ]),
            'count'          => 1,
            'price'          => 500
        ]);

        Order::create([
            'id_counterpaty' => 5,
            'products'       => serialize([
                2 => [
                    'count' => 1,
                    'price' => 200
                ]
            ]),
            'count'          => 1,
            'price'          => 200
        ]);
    }
}
