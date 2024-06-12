<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetallePrenda;
use App\Models\Genero;
use App\Models\Persona;
use App\Models\Color;
use App\Models\Talla;

class DetallePrendaController extends Controller
{
    public function newInteres(Request $request)
    {
        // Validar los datos de entrada
        $request->validate([
            'nombre' => 'required|string|max:255',
            'correoElectronico' => 'required|email|max:255',
            'direccion' => 'required|string|max:255',
            'genero' => 'required|string|max:255',
            'celular' => 'required|string|max:20',
            'nombrePrenda' => 'required|string|max:255',
            'talla' => 'required|string|max:255',
            'color' => 'required|string|max:255',
        ]);
    
        // Buscar o crear el género
        $genero = Genero::firstOrCreate(['nombre' => $request->genero]);
    
        // Buscar la persona o crearla si no existe
        $persona = Persona::firstOrCreate(
            ['correo' => $request->correoElectronico],
            [
                'nombre' => $request->nombre,
                'idGenero' => $genero->idGenero,
                'celular' => $request->celular,
                'direccion' => $request->direccion // Asignar un valor predeterminado
            ]
        );
    
        // Obtener el idPersona
        $idPersona = $persona->id;
    
        // Verificar si se obtuvo correctamente el idPersona
        if ($idPersona === null) {
            return response()->json(['message' => 'No se pudo obtener el ID de la persona'], 500);
        }
    
        // Buscar o crear la talla
        $talla = Talla::firstOrCreate(['nombre' => $request->talla]);
    
        // Buscar o crear el color
        $color = Color::firstOrCreate(['nombre' => $request->color]);
    
        // Crear un nuevo registro en la tabla 'detalle_prenda_interes'
        $detallePrendaInteres = DetallePrenda::create([
            'idPersona' => $idPersona,
            'nombrePrenda' => $request->nombrePrenda,
            'idTalla' => $talla->idTalla,
            'idColor' => $color->idColor,
            'idGenero' => $genero->idGenero,
        ]);
    
        // Retornar una respuesta exitosa
        return response()->json([
            'message' => 'Detalle de prenda de interés creado exitosamente',
            'data' => $detallePrendaInteres
        ], 201);
    }
    

    
    

}
