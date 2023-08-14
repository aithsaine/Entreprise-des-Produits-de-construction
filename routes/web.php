<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\ProductController;

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
    return view('admin.dashboard');
});

Route::controller(ClientController::class)->group(function(){
    Route::get("/clients","index")->name("admin.clients.index");
    Route::get("/client/create","create")->name("admin.client.create") ;
    Route::post("/client/create","store")->name("admin.client.store");
});
Route::controller(ProductController::class)->group(function()
{
    Route::get("/products","index")->name("admin.products.index");
    Route::get("/product/create","create")->name("admin.products.create");
});