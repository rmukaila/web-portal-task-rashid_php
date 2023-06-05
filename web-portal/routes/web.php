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

Route::get('/test_response', function () {
    // $tasks = getTasks();
    // return view('welcome')->with('tasks':$tasks);
});

Route::get('/', function () {

    
$bearer_token = 'Bearer 1cd2de386faf22d886b6ff93884a6ab1c75629a2';
// $bearer_token = 'Basic QVBJX0V4cGxvcmVyOjEyMzQ1NmlzQUxhbWVQYXNz';
$url = 'https://api.baubuddy.de/dev/index.php/v1/tasks/select';
// $url = "https://api.baubuddy.de/index.php/login";
$headers = [
    'Content-Type' => 'application/json',
    'Authorization' => $bearer_token,
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
$tasks = json_decode((string)$response->getBody());
// $tokenInfo = json_decode((string)$response->getBody());

// // Handle the response
// // echo $body;
// // return $body;
// // var_dump($tasks);
// $tasks = $tokenInfo->oauth->access_token;
// var_dump($tasks);
// var_dump($tasks);
// var_dump($tasks);
return view('welcome',['tasks'=>$tasks]);


    
});
