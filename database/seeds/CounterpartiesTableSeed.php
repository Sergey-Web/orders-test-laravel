<?php

use Illuminate\Database\Seeder;
use App\Counterparty;

class CounterpartiesTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Counterparty::create([
            'type'  => 'provider',
            'name'  => 'Counterparty1',
            'phone' => '380677799221',
            'email' => 'counterparty1@gmail.com',
        ]);

        Counterparty::create([
            'type'  => 'buyer',
            'name'  => 'Counterparty2',
            'phone' => '380677799222',
            'email' => 'counterparty2@gmail.com',
        ]);

        Counterparty::create([
            'type'  => 'buyer',
            'name'  => 'Counterparty3',
            'phone' => '380677799223',
            'email' => 'counterparty3@gmail.com',
        ]);

        Counterparty::create([
            'type'  => 'provider',
            'name'  => 'Counterparty4',
            'phone' => '380677799224',
            'email' => 'counterparty4@gmail.com',
        ]);

        Counterparty::create([
            'type'  => 'provider',
            'name'  => 'Counterparty5',
            'phone' => '380677799225',
            'email' => 'counterparty5@gmail.com',
        ]);
    }
}
