<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Elemento extends Model
{
    use HasFactory;
    protected $fillable = [
        'titulo',
        'descripcion',
        'Prov_id',
        'listas_id'
    ];
}
