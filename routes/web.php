<?php

use App\Http\Controllers\MemberController;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');
Route::post('auth/warga',[MemberController::class,'login'])->name('login');
Route::middleware(['admin'])->group(function () {
    Route::get('home/admin/',[MemberController::class,'home'])->name('dsb');
    Route::get('/register',[MemberController::class,'regis'])->name('regis');
    Route::post('auth/admin/register',[MemberController::class,'register'])->name('register');
    Route::get('logout/admin/',[MemberController::class,'logout'])->name('logout');
});
