<?php

use App\Http\Controllers\MemberController;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');
Route::post('auth/warga',[MemberController::class,'login'])->name('login');
Route::middleware(['warga'])->group(function(){
    Route::get('home/warga/',[MemberController::class,'home'])->name('dsb');
});
