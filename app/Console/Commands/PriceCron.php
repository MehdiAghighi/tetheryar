<?php

namespace App\Console\Commands;

use App\Models\TetherPrice;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class PriceCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'price:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
// Generated by curl-to-PHP: http://incarnate.github.io/curl-to-php/
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://api.nobitex.ir/v2/orderbook/USDTIRT');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $result = curl_exec($ch);
        $result=json_decode($result); // print json decoded response
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);

        $tetherBuyPrice = substr($result->asks[0][0] ,0, 5);
        $tetherBuyPrice = floor($tetherBuyPrice/10)*10;
        $tetherSellPrice = $tetherBuyPrice - 200 ;

        TetherPrice::query()->create([
            'buyPrice' => $tetherBuyPrice ,
            'sellPrice' => $tetherSellPrice ,
        ]);
//        Log::info("Cron is working fine!");
//        return 0;
    }
}
