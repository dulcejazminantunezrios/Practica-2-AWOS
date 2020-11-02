<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\modelos\personas;

class PersonaController extends Controller
{
    public function mostrar_per($id=null){
        if($id)
            return response()->json(["Persona"=>personas::find($id)],201);
        return response()->json(["Personas"=>personas::all()],201);
    }
    public function crear_per(Request $request){
        $pe= new personas;
        $pe->nombre=$request->nombre;
        $pe->apellido=$request->apellido;
        $pe->correo=$request->correo;
        $pe->edad=$request->edad;
        if($pe->save())
            return response()->json(["La persona fue creada:"=>$pe],201);
        return response()->json(null,400);
    }
    public function actualizar_per(Request $request, $id){
        $pe=new personas;
        $pe=personas::find($id);
        $pe->nombre=$request->nombre;
        $pe->apellido=$request->apellido;
        $pe->correo=$request->correo;
        $pe->edad=$request->edad;
        if($pe->save())
            return response()->json(["La persona fue actualizada:"=>$pe],201);
        return response()->json(null,400);
    }
    public function borrar_per($id){
        $pe=new personas;
        $pe=personas::find($id);
        if($pe->delete())
            return response()->json(["La persona fue eliminada"=>$pe],201);
        return response()->json(null,400);
    }
    public function __construct(){
        $this->middleware('checar.edad',['only'=>['actualizar_per','crear_per']]);
    }
}
