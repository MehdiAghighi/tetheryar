<?php

namespace Database\Seeders;

use App\Models\TetherPrice;
use Illuminate\Database\Seeder;

class TetherPriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TetherPrice::query()->create([
            'buyPrice' => 24900 ,
            'sellPrice' => 24700 ,
        ]);
    }
}
