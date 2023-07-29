<?php

use Illuminate\Support\Facades\Route;

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

    $data = [
        "title" => "Dashboard",
        "user" => [
            "name" => "<h5>Hallo, Azmi</h5>",
            "email" => "azmi@gmail.com",
        ]
    ];
    return view('contents.dashboard', $data);
});

Route::get('/users', function () {
    return view('contents.users', [
        "title" => "Users"
    ]);
});