<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipoproducto extends Model
{
    protected $table = 'tipoproductos';

    protected $fillable = ['nombre'];
}
