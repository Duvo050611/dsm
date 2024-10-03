<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes = Cliente::all();
        return view('cliente.index', compact('clientes'));
    }

    public function create()
    {
        return view('clientes.create');
    }

    public function store(Request $request)
    {

        $cliente = new Cliente();
        $cliente->nombre = $request->input('nombre');
        $cliente->apellido = $request->input('apellido');
        $cliente->telefono = $request->input('telefono');
        $cliente->direccion = $request->input('direccion');
        $cliente->ciudad = $request->input('ciudad');
        $cliente->save();

        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $cliente = Cliente::find($id);
        $cliente->nombre = $request->input('nombre');
        $cliente->apellido = $request->input('apellido');
        $cliente->telefono = $request->input('telefono');
        $cliente->direccion = $request->input('direccion');
        $cliente->ciudad = $request->input('ciudad');
        $cliente->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $cliente = Cliente::find($id);
        $cliente->delete();
        return redirect()->back();
    }
}
