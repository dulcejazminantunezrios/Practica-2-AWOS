<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use App\modelos\User;
use Illuminate\Support\Facades\Hash;
use Log;
use App\Http\Controllers\Controller;

class UsuarioController extends Controller
{
    public function indice(Request $request){
        if($request->user()->tokenCan('admin:admin')){
            return response()->json(["Usuarios:"=> User::all()],200);
        }
        if($request->user()->tokenCan('user:info')){
            return response()->json(["perfil"=>$request->user()],200);
        }
        abort(401,"No válido");
    }
    public function agregar(Request $request){
        $request->validate([
            'email'=>'required|email', 
            'password'=>'required', 
            'name'=>'required',
            'persona'=>'required',
            'permiso'=>'required'
     ]);

        $usuario = new User();
        $usuario->name = $request->name;
        $usuario->email = $request->email;
        $usuario->password = Hash::make($request->password);
        $usuario->persona = $request->persona;
        $usuario->permiso=$request->permiso;
        if($usuario->save()){
            return response()->json(["Usuario creado:"=>$usuario],200);
        }
        return response()->json("No se pudo crear",400);
    }
    public function login(Request $request){
        $request->validate([
            'email'=>'required|email', 'password'=>'required'
        ]);
        $usuario= User::where('email',$request->email)->first();
        if(!$usuario || !Hash::check($request->password, $usuario->password)){
            throw ValidationException::withMessages([
                'email|password'=>["Datos invalidos"]
            ]);
        }
        if($usuario->permiso=='admin'){
        $tkn=$usuario->createToken($request->email,['admin:admin'])->plainTextToken;
        return response()->json([201,"Tu TOKEN de admin es:"=>$tkn]);}
        else{
            $tkn=$usuario->createToken($request->email,['user:info'])->plainTextToken;
            return response()->json(["Tu token es:"=>$tkn],201);
        }
    }
    public function update_per(Request $request)
    {
        $usuario=User::find ($request->id);  
        $usuario->permiso=$request->permiso;  
        if($user->save()){
            return response()->json(["cambio el permiso del usuario"=>$user]);   
        }
        return response()->json(["No se pudo actualizar"],400);
    }
}

