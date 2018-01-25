<?php

use Illuminate\Database\Seeder;
use App\Counterpaty;

class CounterpatiesTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Counterpaty::create([
            'type'  => 'provider',
            'name'  => 'counterpaty1',
            'phone' => '380677799221',
            'email' => 'counterpaty1@gmail.com',
        ]);

        Counterpaty::create([
            'type'  => 'buyer',
            'name'  => 'counterpaty2',
            'phone' => '380677799222',
            'email' => 'counterpaty2@gmail.com',
        ]);

        Counterpaty::create([
            'type'  => 'buyer',
            'name'  => 'counterpaty3',
            'phone' => '380677799223',
            'email' => 'counterpaty3@gmail.com',
        ]);

        Counterpaty::create([
            'type'  => 'provider',
            'name'  => 'counterpaty4',
            'phone' => '380677799224',
            'email' => 'counterpaty4@gmail.com',
        ]);

        Counterpaty::create([
            'type'  => 'buyer',
            'name'  => 'counterpaty5',
            'phone' => '380677799225',
            'email' => 'counterpaty5@gmail.com',
        ]);

        Counterpaty::create([
            'type'  => 'buyer',
            'name'  => 'counterpaty6',
            'phone' => '380677799225',
            'email' => 'counterpaty6@gmail.com',
        ]);
    }
}
