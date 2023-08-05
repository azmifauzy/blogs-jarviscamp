<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Models\Post;
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

Route::get('/users/create', [UserController::class, 'create']);
Route::get('/users', [UserController::class, 'index']);
Route::post('/users', [UserController::class, 'store']);
Route::get('/users/{id}', [UserController::class, 'show']);
Route::get('/users/{id}/edit', [UserController::class, 'edit']);
Route::put('/users/{id}', [UserController::class, 'update']);

Route::resource('/categories', CategoryController::class);