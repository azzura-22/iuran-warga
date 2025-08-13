<?php

use App\Http\Controllers\CategoriController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PaymentController;
use App\Models\member;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');
Route::post('auth/warga',[MemberController::class,'login'])->name('login');
Route::middleware(['admin'])->group(function () {
    Route::get('/home/admin/',[MemberController::class,'home'])->name('dsb');
    Route::get('/data/category',[CategoriController::class,'view'])->name('data');
    Route::get('/category',[CategoriController::class,'index'])->name('category');
    Route::get('/register',[MemberController::class,'regis'])->name('regis');
    Route::get('/delete/category/{id}',[CategoriController::class,'delete'])->name('deletecategory');
    Route::post('/store/category',[CategoriController::class,'store'])->name('storecategory');
    Route::post('/auth/admin/register',[MemberController::class,'register'])->name('register');
    Route::get('logout/admin/',[MemberController::class,'logout'])->name('logout');
    Route::get('/data/member',[MemberController::class,'dataMember'])->name('datamember');
    Route::get('/admin/edit/category/{id}',[CategoriController::class,'editView'])->name('editcategory');
    Route::post('/update/category/{id}',[CategoriController::class,'edit'])->name('updatecategory');
    Route::get('/admin/edit/member/{id}',[MemberController::class,'edit'])->name('editmember');
    Route::get('/delete/member/{id}',[MemberController::class,'delete'])->name('deletemember');
    Route::get('/payment/admin',[PaymentController::class,'index'])->name('payment');
    Route::post('/update/payment/{id}',[PaymentController::class,'update'])->name('updatepayment');
    Route::post('/update/member/admin/{id}',[MemberController::class,'update'])->name('updatemember');
    Route::get('/search/payment',[PaymentController::class,'indexi'])->name('searchpayment');
    Route::get('/add/payment',[PaymentController::class,'addpy'])->name('addpayment');
});
Route::middleware(['warga'])->group(function () {
    Route::get('/home/warga/',[MemberController::class,'warga'])->name('homewarga');
    Route::get('/logout/warga/',[MemberController::class,'logout'])->name('logoutwarga');
    Route::get('edit/member/{id}',[MemberController::class,'profile'])->name('profilemember');
    Route::post('update/member/{id}',[MemberController::class,'updateProfile'])->name('updatememberprofile');
});
