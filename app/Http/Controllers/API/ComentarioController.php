<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\modelos\comentarios;
use Illuminate\Support\Facades\DB;


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
        $com->persona_id=$request->persona_id;
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
        $com->persona_id=$request->persona_id;
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
    public function per_com(Request $nombre){
        $per_com=DB::table('comentarios')
        ->join('personas','comentarios.persona_id','=','personas.id')
        ->where('personas.nombre','=',$nombre->nombre)
        ->select('personas.nombre','comentarios.cuerpo','comentarios.titulo')
        ->get();
        return response()->json(["Los comentarios que has realizado son:"=>$per_com],201);
    }
    public function prod_com(Request $id){
        $prod_com=DB::table('comentarios')
        ->join('productos','comentarios.producto_id','=','productos.id')
        ->where('productos.id','=',$id->id)
        ->select('productos.nombre_p','productos.precio','comentarios.titulo','comentarios.cuerpo')
        ->get();
        return response()->json(["Los comentarios del producto son:"=>$prod_com],201);
    }
    public function todo_rel(){
        $todo=DB::table('comentarios')
        ->join('productos','comentarios.producto_id','=','productos.id')
        ->join('personas', 'comentarios.persona_id','=','personas.id')
        ->select('personas.nombre','productos.nombre_p','productos.precio','comentarios.titulo','comentarios.cuerpo')
        ->get();
        return response()->json(["Comentarios, personas y productos:"=>$todo],201);
    }
}
