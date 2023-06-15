<?php

use Illuminate\Support\Facades\Route;
use GuzzleHttp\Client;
// use routes\Helpers;

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

//call helper function to fetch data
$tasks = fetchOrUpdateData();

return view('welcome',['tasks'=>$tasks]);


    
});

Route::get('/get_data_only', function () {

    //call helper function to fetch data
    $tasks = fetchOrUpdateData();

    return $tasks;

});
