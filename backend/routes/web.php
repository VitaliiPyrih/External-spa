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

Route::get('/api', function () {
    \Illuminate\Support\Facades\Cache::rememberForever('test',function () {
       return 'work';
    });
    echo \Illuminate\Support\Facades\Cache::get('test');
});
