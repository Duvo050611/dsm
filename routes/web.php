<?php

use App\Http\Controllers\ClienteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Models\Cliente;

Route::get('/', function () {
    // $clientes = Cliente::all(); 
    // // dd($clientes); 
    // return view('cliente.index', compact('clientes'));
    return redirect ()->route('home.index');
});

Auth::routes();

Route::resource('home', ClienteController::class);


Route::post('/productos', [ProductoController::class, 'store']);

Route::get('/crear-producto', function () {
    return view('crear_producto');
});

