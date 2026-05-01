<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hermandad extends Model
{
    protected $table = 'hermandades';
    
    protected $fillable = ['nombre', 'sede', 'descripcion', 'imagen_url'];
}
