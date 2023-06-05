<?php

use Illuminate\Support\Facades\Route;
use GuzzleHttp\Client;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test_response', function () {

    

$url = 'https://api.baubuddy.de/dev/index.php/v1/tasks/select';
$headers = [
    'Content-Type' => 'application/json',
    'Authorization' => 'Bearer 91f14c3e4e72b9645bc36f7f31239a4295bc48e8',
];
$data = [
    'username' => '365',
    'password' => '1',
];

$client = new Client();
$response = $client->get($url, [
    'headers' => $headers,
    'json' => $data,
]);

// Get the response body
$body = $response->getBody();

// Handle the response
echo $body;

    return res;
});
