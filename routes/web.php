<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuCtrl;

 // Midway Orders
 Route::view('/', 'index');
 Route::view('/kitchen', 'kitchen');

Route::post('/save_order', [MenuCtrl::class, 'save_order']);
Route::post('/recieve_orders', [MenuCtrl::class, 'recieve_orders']);
Route::post('/remove_order', [MenuCtrl::class, 'remove_order']);
