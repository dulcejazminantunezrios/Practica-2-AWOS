<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API;
use App\modelos;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//productos
Route::get("productos","API\ProductoController@mostrar_prod");//R todos los productos sin excepción
Route::get("productos/{id?}","API\ProductoController@mostrar_prod")->where("id","[1-200]+");//R muestra producto segun id
Route::post("productos","API\ProductoController@crear_prod")->middleware('checar.precio');//C crear un producto
Route::put("productos/{id}","API\ProductoController@actualizar_prod")->where("id","[1-200]+")->middleware('checar.precio');//U actualizar producto
Route::delete("productos/{id}","API\ProductoController@borrar_prod");//D borrar especifico

//comentarios
Route::get("comentarios","API\ComentarioController@mostrar_com");//R todos los comentarios sin excepcion
Route::get("comentarios/{id?}","API\ComentarioController@mostrar_com")->where("id","[1-100]+");//R muestra comentario segun id
Route::post("comentarios","API\ComentarioController@crear_com");//C crear comentario
Route::put("comentarios/{id}","API\ComentarioController@actualizar_com")->where("id","[1-100]+");// U actualizar comentario
Route::delete("comentarios/{id}","API\ComentarioController@borrar_com");//D borrar comentario especifico

//personas
Route::get("personas","API\PersonaController@mostrar_per");//R todas las personas sin excepcion
Route::get("personas/{id?}","API\PersonaController@mostrar_per")->where("id","[1-200]+");//R muestra  segun id
Route::post("personas","API\PersonaController@crear_per")->middleware('checar.edad');//C crear persona
Route::put("personas/{id}",'API\PersonaController@actualizar_per')->where("id","[1-200]+")->middleware('checar.edad');// U actualizar personas
Route::delete("personas/{id}","API\PersonaController@borrar_per");//D borrar personas especifico
//Route::put("personas",['middleware'=>'checar.edad','API\PersonaController@actualizar_per']);
//Route::post("personas",['middleware'=>'checar.edad','API\PersonaController@crear_per']);
