<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;


class SaleController extends Controller
{
    public function index()
{
    $sales = Sale::paginate(1); 
    return view('sales.index', compact('sales'));   
}

    public function store(Request $request)
{
    $request->validate([
        'date' => 'required|date',
        'quantity' => 'required|integer',
        'unit_price' => 'required|numeric',
        'total' => 'required|numeric',
    ]);

    Sale::create($request->all());

    return redirect()->route('sales.index')->with('success', 'Venta creada exitosamente');
}

public function update(Request $request, $id)
{
    $request->validate([
        'date' => 'required|date',
        'quantity' => 'required|integer',
        'unit_price' => 'required|numeric',
        'total' => 'required|numeric',
    ]);

    $sale = Sale::findOrFail($id);
    $sale->update($request->all());

    return redirect()->route('sales.index')->with('success', 'Venta actualizada exitosamente');
}


public function destroy($id)
{       
        $sale = Sale::find($id);

        $sale->delete();

        return redirect()->route('sales.index')->with('success', 'Producto eliminado correctamente.');
}
}

