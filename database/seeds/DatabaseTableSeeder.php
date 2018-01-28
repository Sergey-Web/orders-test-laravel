<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CounterpatiesTableSeeder::class,
            ProductsTableSeeder::class,
            OrdersSeeder::class,
            StorageTableSeeder::class
        ]);
    }
}
