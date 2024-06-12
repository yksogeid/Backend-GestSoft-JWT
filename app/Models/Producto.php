<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $table = "productos_pto";
    protected $primaryKey = 'idProducto';

    // Agrega las propiedades a la matriz fillable
    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
        'stock',
        'idTalla',
        'idColor',
    ];
    public function talla()
    {
        return $this->belongsTo(Talla::class, 'idTalla');
    }

    public function color()
    {
        return $this->belongsTo(Color::class, 'idColor');
    }
}
