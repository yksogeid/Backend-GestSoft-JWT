<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    function getColor(){
        $data = Color::get();
       return response()->json($data);
    }
    public function registrarColor(Request $request)
    {
        // Validar los datos recibidos
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        $color = Color::create([
            'nombre' => $validatedData['nombre'],
        ]);

        return response()->json([
            'message' => 'Color registrada correctamente',
            'color' => $color
        ], 201);
    }
}
