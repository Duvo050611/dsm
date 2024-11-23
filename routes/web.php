<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\SaleController;
use App\Http\Middleware\IsAuthenticated;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home'); 
});

Route::get('login', [AuthController::class, 'showLogin'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('home', [HomeController::class, 'home'])->name('home');

Route::middleware([IsAuthenticated::class])->group(function () {
    Route::get('clientes', [ClienteController::class, 'index'])->name('clientes.index');
    Route::get('clientes/create', [ClienteController::class, 'create'])->name('clientes.create');
    Route::post('clientes', [ClienteController::class, 'store'])->name('clientes.store');
    Route::get('clientes/{id}', [ClienteController::class, 'show'])->name('clientes.show');
    Route::get('clientes/{id}/edit', [ClienteController::class, 'edit'])->name('clientes.edit');
    Route::put('clientes/{id}', [ClienteController::class, 'update'])->name('clientes.update');
    Route::delete('clientes/{id}', [ClienteController::class, 'destroy'])->name('clientes.destroy');

    Route::get('productos', [ProductoController::class, 'index'])->name('productos.index');
    Route::get('productos/create', [ProductoController::class, 'create'])->name('productos.create');
    Route::post('productos', [ProductoController::class, 'store'])->name('productos.store');
    Route::get('productos/{id}', [ProductoController::class, 'show'])->name('productos.show');
    Route::get('productos/{id}/edit', [ProductoController::class, 'edit'])->name('productos.edit');
    Route::put('productos/{id}', [ProductoController::class, 'update'])->name('productos.update');
    Route::delete('productos/{id}', [ProductoController::class, 'destroy'])->name('productos.destroy');

    Route::get('sales', [SaleController::class, 'index'])->name('sales.index');
    Route::get('sales/create', [SaleController::class, 'create'])->name('sales.create');
    Route::post('sales', [SaleController::class, 'store'])->name('sales.store');
    Route::get('sales/{id}', [SaleController::class, 'show'])->name('sales.show');
    Route::get('sales/{id}/edit', [SaleController::class, 'edit'])->name('sales.edit');
    Route::put('sales/{id}', [SaleController::class, 'update'])->name('sales.update');
    Route::delete('sales/{sale}', [SaleController::class, 'destroy'])->name('sales.destroy');
});

Route::get('/no-access', function () {
    return view('no-access'); 
})->name('no-access');
