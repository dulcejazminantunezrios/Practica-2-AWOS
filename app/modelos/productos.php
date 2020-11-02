<?php

namespace App\modelos;

use Illuminate\Database\Eloquent\Model;

class productos extends Model
{
    protected $table= 'productos';

    public function comentarios(){
        return $this->hasMany('App\modelos\comentarios');
    }
}
