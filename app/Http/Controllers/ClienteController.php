<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $clientes = Cliente::paginate(10); 
    return view('cliente.index', ['clientes' => $clientes]);
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
        session()->flash('success', 'Cliente creado satisfactoriamente.');
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
        return redirect()->route('clientes.index')->with('success', 'Cliente editado correctamente.');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $cliente = Cliente::find($id);
        $cliente->delete();
        return redirect()->back()->with('success', 'Cliente eliminado correctamente.');

    }

}
