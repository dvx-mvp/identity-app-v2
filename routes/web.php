<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function(){

    $config = [
        "use_ssl"  => false,
        "protocol" => "http",
        "host" => "bigalice2.nem.ninja", // testing uses online NIS
        "port" => 7890,
        "endpoint" => "/",
    ];
    // each test should have its own API configured
    $client = new NEM\API();
    $client->setOptions($config);
    // each test should have its own SDK instance
    $sdk = new NEM\SDK([], $client);
    $service = $sdk->account();

    $account = $service->getFromAddress("TCPCAZ7XJ2X4SWR6AG6BUEKS6DQ7DLZ2D6QB5M2V");

    $incomings = $service->incomingTransactions("TCPCAZ7XJ2X4SWR6AG6BUEKS6DQ7DLZ2D6QB5M2V");

    dd($incomings[0]->messagePayload);

});
