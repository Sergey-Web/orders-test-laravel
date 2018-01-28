<?php

use Illuminate\Database\Seeder;
use App\Storage;

class StorageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Storage::create([
            'id_counterpaty' => 4,
            'id_product'     => 8,
            'receipt'        => 10,
            'count'          => 10
        ]);

        Storage::create([
            'id_counterpaty' => 4,
            'id_product'     => 9,
            'receipt'        => 100,
            'count'          => 100
        ]);

        Storage::create([
            'id_counterpaty' => 1,
            'id_product'     => 1,
            'receipt'        => 100,
            'count'          => 100
        ]);

        Storage::create([
            'id_counterpaty' => 1,
            'id_product'     => 2,
            'receipt'        => 10,
            'count'          => 2000
        ]);

        Storage::create([
            'id_counterpaty' => 4,
            'id_product'     => 9,
            'receipt'        => 20,
            'count'          => 120
        ]);

        Storage::create([
            'id_counterpaty' => 4,
            'id_product'     => 12,
            'receipt'        => 2,
            'count'          => 2
        ]);

        Storage::create([
            'id_counterpaty' => 2,
            'id_product'     => 1,
            'receipt'        => -10,
            'count'          => 90
        ]);

        Storage::create([
            'id_counterpaty' => 2,
            'id_product'     => 2,
            'receipt'        => -1,
            'count'          => 9
        ]);

        Storage::create([
            'id_counterpaty' => 3,
            'id_product'     => 1,
            'receipt'        => -1,
            'count'          => 89
        ]);

        Storage::create([
            'id_counterpaty' => 3,
            'id_product'     => 2,
            'receipt'        => -2,
            'count'          => 7
        ]);

        Storage::create([
            'id_counterpaty' => 5,
            'id_product'     => 2,
            'receipt'        => -3,
            'count'          => 4
        ]);

        Storage::create([
            'id_counterpaty' => 2,
            'id_product'     => 8,
            'receipt'        => -2,
            'count'          => 8
        ]);

        Storage::create([
            'id_counterpaty' => 2,
            'id_product'     => 9,
            'receipt'        => -1,
            'count'          => 119
        ]);

        Storage::create([
            'id_counterpaty' => 5,
            'id_product'     => 8,
            'receipt'        => -1,
            'count'          => 7
        ]);

        Storage::create([
            'id_counterpaty' => 5,
            'id_product'     => 2,
            'receipt'        => -1,
            'count'          => 3
        ]);
    }
}
