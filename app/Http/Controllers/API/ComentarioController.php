<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\modelos\comentarios;

class ComentarioController extends Controller
{
    public function mostrar_com($id){
            return response()->json(["Comentario:"=>comentarios::find($id)],201);
       // return response()->json(["Comentarios:"=>comentarios::all()],201);
    }
    public function crear_com(Request $request){
        $com=new comentarios;
        $com->titulo=$request->titulo;
        $com->cuerpo=$request->cuerpo;
        $com->producto_id=$request->producto_id;

        if($com->save())
            return response()->json(["El comentario fue creado:"=>$com],201);
        return response()->json(null,400);

    }
    public function actualizar_com(Request $request, $id){
        $com=new comentarios;
        $com=comentarios::find($id);
        $com->titulo=$request->titulo;
        $com->cuerpo=$request->cuerpo;
        $com->producto_id=$request->producto_id;
        if($com->save())
            return response()->json(["El comentario fue actualizado:"=>$com],201);
        return response()->json(null,400);
    }
    public function borrar_com($id){
        $com=new comentarios;
        $com=comentarios::find($id);
        if($com->delete())
            return response()->json(["El comentario fue eliminado:"=>$com],201);
        return response()->json(null,400);
    }
}
