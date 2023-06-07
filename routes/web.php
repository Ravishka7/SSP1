<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ProductController;

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
    return view('welcome');
});

Route::get('/redirect',[RoleController::class,"index"]);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
    ])->group(function () {

        Route::get('/dashboard', [Rolecontroller::class,"index"]
        
        )->name('dashboard');
        
        });
        
        Route::get('/logout', function () {
            Auth::guard('web')->logout();
            return redirect('/');
        })->name('logout');

        Route::get('/redirect',[ProductController::class,"index"]);
        Route::get('create-product',[ProductController::class,"createProduct"]);
        Route::post('save-product',[ProductController::class,"saveProduct"]);
        Route::get('edit-product/{id}',[ProductController::class,"editProduct"]);
        Route::post('update-product',[ProductController::class,"updateProduct"]);
        Route::get('delete-product/{id}',[ProductController::class,"deleteProduct"]);