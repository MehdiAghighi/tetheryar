<?php

namespace Database\Seeders;

use App\Models\Wallet;
use Illuminate\Database\Seeder;

class WalletSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Wallet::query()->insert([
            [
                'wallet_type' => 'tether-trc20' ,
                'wallet_address' => 'Tddsfkhjwdsf635dsfdsjkhdsfsdfkjhdsf',
                'wallet_qrcode' => 'public/wallets/trc20.jpeg'
            ],

            [
                'wallet_type' => 'tether-erc20' ,
                'wallet_address' => '0x56dddsfkhjwdsf635dsfdsjkhdsdsfsdfjuk',
                'wallet_qrcode' => 'public/wallets/trc20.png'
            ],

        ]);
    }
}
