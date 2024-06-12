<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    function getProducto(){
        $data = Producto::with(['talla', 'color'])->get();
        return response()->json($data);
    }
    public function newProducto(Request $request)
    {
        // Validación inicial para nombre, descripcion, precio, y stock
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string|max:1000',
            'precio' => 'required|numeric',
            'stock' => 'required|integer',
            'talla' => 'required|string',
            'color' => 'required|string',
        ]);
    
        // Busca los IDs de talla y color, crea si no existen
        $talla = \App\Models\Talla::firstOrCreate(['nombre' => $request->talla]);
        $color = \App\Models\Color::firstOrCreate(['nombre' => $request->color]);
    
        // Crea el producto con los IDs encontrados
        $producto = Producto::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'precio' => $request->precio,
            'stock' => $request->stock,
            'idTalla' => $talla->idTalla,
            'idColor' => $color->idColor,
        ]);
    
        return response()->json($producto, 201);
    }
    

    
}
