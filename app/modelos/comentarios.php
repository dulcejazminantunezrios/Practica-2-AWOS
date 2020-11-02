<?php

namespace App\modelos;

use Illuminate\Database\Eloquent\Model;

class comentarios extends Model
{
    protected $table= 'comentarios';

    public function persona(){
        return $this->belongsTo('App\modelos\personas');
    }
    public function producto(){
        return $this->belongsTo('App\modelos\productos');
    }
}
