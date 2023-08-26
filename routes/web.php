<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\CommandeController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\ProductController;
use Illuminate\Http\Request;

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
    Route::get("/client/{client_id}/situation","situation")->name("admin.client.situation");
    Route::get("/client/{client_id}/situation/download","printSituation")->name("admin.client.situation.print");

});
Route::controller(ProductController::class)->group(function()
{
    Route::get("/products","index")->name("admin.products.index");
    Route::get("/product/create","create")->name("admin.products.create");
    Route::post("/product/store",'store')->name("admin.products.store");
});
Route::controller(CommandeController::class)->group(function()
{
    Route::get("/commandes","index")->name("admin.commande.index");
    Route::get("/commande/{client}/create","create")->name("admin.commande.create");
    Route::post("/commande/commander/{client}",'commander')->name("admin.commande.commander");
    Route::get("/commande/{commande}/print","print")->name("admin.commande.print");
});

Route::controller(PaymentController::class)->group(function(){
    Route::get("/payments",'index')->name("admin.payments.index");
    Route::post("payment/store","store")->name("admin.payment.store");

});
Route::controller(AdminController::class)->group(function(){
    Route::get("admin/","index")->name("admin.dashboard");
});