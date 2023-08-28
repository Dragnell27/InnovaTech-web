<?php

namespace App\Http\Controllers\Pay;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class PaypalController extends Controller
{
    public function process($orderId){
        $client = new Client([
            'base_url' => 'https://api-m.sandbox.paypal.com'
        ]);
        $client->get('/v2/checkout/orders/'. $orderId);
        dd($client);
    }
}
