<?php

namespace App\Http\Controllers;
use App\Models\Persona;
use App\Models\Color;
use App\Models\Talla;
use App\Models\Producto;

use Illuminate\Http\Request;

class ConteoTotalController extends Controller
{
    public function conteoTotal()
    {
        $totalTallas = Talla::count();
        $totalColores = Color::count();
        $totalPersona = Persona::count();
        $totalProductos = Producto::count();

        return response()->json([
            'totalTallas' => $totalTallas,
            'totalColores' => $totalColores,
            'totalPersonas' => $totalPersona,
            'totalProductos' => $totalProductos,
        ]);
    }
}
