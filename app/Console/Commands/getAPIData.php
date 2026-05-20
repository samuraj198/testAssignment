<?php

namespace App\Console\Commands;

use App\Models\Crypto;
use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

#[Signature('app:getAPIData')]
#[Description('Console command for get Bitcoin price and add it to db')]
class getAPIData extends Command
{
    public function handle()
    {
        $response = Http::withoutVerifying()
            ->withUserAgent('testAssignment/v1.0')
            ->get('https://api.coingecko.com/api/v3/simple/price', [
                'ids' => 'bitcoin',
                'vs_currencies' => 'usd'
        ]);

        Crypto::create([
            'name' => "Bitcoin",
            'price' => $response->json()['bitcoin']['usd'],
        ]);
    }
}
