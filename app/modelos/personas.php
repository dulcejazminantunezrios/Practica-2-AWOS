<?php

namespace App\modelos;

use Illuminate\Database\Eloquent\Model;

class personas extends Model
{
    protected $table= 'personas';

    public function comentarios(){
        return $this->hasMany('App\modelos\comentarios');
    }
}
