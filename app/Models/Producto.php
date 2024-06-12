<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $table = "productos_pto";
    public function talla()
    {
        return $this->belongsTo(Talla::class, 'idTalla');
    }

    public function color()
    {
        return $this->belongsTo(Color::class, 'idColor');
    }
}
