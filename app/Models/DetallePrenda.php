<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetallePrenda extends Model
{
    use HasFactory;
    protected $table = "detalle_prenda_interes";
    // Especificar los campos que se pueden asignar masivamente
    protected $fillable = [
        'idPersona',
        'nombrePrenda',
        'idGenero',
        'idTalla',
        'idColor'
    ];

    // Relaciones
    public function persona()
    {
        return $this->belongsTo(Persona::class, 'idPersona');
    }

    public function genero()
    {
        return $this->belongsTo(Genero::class, 'idGenero');
    }

    public function talla()
    {
        return $this->belongsTo(Talla::class, 'idTalla');
    }

    public function color()
    {
        return $this->belongsTo(Color::class, 'idColor');
    }
}
