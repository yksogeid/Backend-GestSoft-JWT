<?php

namespace App\Http\Controllers;

use App\Models\Talla;
use Illuminate\Http\Request;

class TallaController extends Controller
{
    function getTalla(){
        $data = Talla::get();
       return response()->json($data);
    }
    public function registrarTalla(Request $request)
    {
        // Validar los datos recibidos
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        $talla = Talla::create([
            'nombre' => $validatedData['nombre'],
        ]);

        return response()->json([
            'message' => 'Talla registrada correctamente',
            'talla' => $talla
        ], 201);
    }
}
