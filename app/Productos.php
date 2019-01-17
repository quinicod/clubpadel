<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    protected $table = 'Productos';

    protected $fillable = ['nombre', 'descripcion', 'precio', 'talla', 'stock','marca','tipo','imagen'];
}
