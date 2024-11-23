<?php
namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::paginate(2);
        return view('productos.index', compact('productos'));
    }

    public function store(Request $request)
{
    $request->validate([
        'nombre' => 'required|string|max:255',
        'descripcion' => 'required|string|max:255',
        'precio' => 'required|numeric|min:0',
        'stock' => 'required|integer|min:0' 
    ]);

    Producto::create($request->all());
    return redirect()->route('productos.index')->with('success', 'Producto creado satisfactoriamente.');
}


public function update(Request $request, $id)
{
    try {
        $producto = Producto::findOrFail($id);
        $producto->update($request->all());

        return response()->json([
            'id' => $producto->id,
            'nombre' => $producto->nombre,
            'descripcion' => $producto->descripcion,
            'precio' => $producto->precio,
            'stock' => $producto->stock
        ]);
    } catch (\Exception $e) {
        return response()->json(['error' => 'Error al actualizar el producto'], 500);
    }
}

public function destroy($id)
{
    $producto = Producto::findOrFail($id);
    $producto->delete();

    return response()->json(['message' => 'Producto eliminado exitosamente'], 200);
}

}