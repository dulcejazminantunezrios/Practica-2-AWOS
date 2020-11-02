<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\modelos\productos;

class ProductoController extends Controller
{
    public function mostrar_prod($id=null){
        if($id)
            return response()->json(["Producto:"=>productos::find($id)],201);
        return response()->json(["Productos"=>productos::all()],201);
    }
    public function crear_prod(Request $request){
        $pr=new productos;
        $pr->nombre_p=$request->nombre_p;
        $pr->descripcion=$request->descripcion;
        $pr->precio=$request->precio;

        if($pr->save())
            return response()->json(["El producto fue creado:"=>$pr],201);
        return response()->json(null,400);
    }
    public function actualizar_prod(Request $request,$id){
        $pr=new productos;
        $pr=productos::find($id);
        $pr->nombre_p=$request->nombre_p;
        $pr->descripcion=$request->descripcion;
        $pr->precio=$request->precio;
        if($pr->save())
            return response()->json(["El producto fue actualizado:"=>$pr],201);
        return response()->json(null,400);
    }
    public function borrar_prod($id){
        $pr=new productos;
        $pr=productos::find($id);
        if($pr->delete())
            return response()->json(["El producto fue borrado:"=>$pr],201);
        return response()->json(null,400);
    }

}
