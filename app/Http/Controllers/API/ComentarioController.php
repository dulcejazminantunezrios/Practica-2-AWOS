<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\modelos\comentarios;
use Illuminate\Facades\DB;

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
    public function relac_per_coms(Request $nombre){
        $per_com=DB::table('comentarios')->join('personas','comentarios.persona_id','=','personas.id')->where('personas.nombre','=',$nombre->nombre)->select('personas.nombre','comentarios.id','comentarios.cuerpo','comentarios.titulo')->get();
        return response()->json(["Los comentarios que has realizado son:"=>$per_com],201);
    }
    public function relac_com_prod(Request $prod){
        $prod_com=DB::table('productos')->join('comentarios','comentarios.producto_id','=','productos.id')->where('productos.nombre_p','=',$prod->nombre_p)->select('productos.nombre_p','productos.precio','comentarios.titulo','comentarios.titulo')->get();
    }
}
