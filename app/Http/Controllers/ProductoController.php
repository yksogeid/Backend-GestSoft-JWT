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
}
