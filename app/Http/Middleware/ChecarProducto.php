<?php

namespace App\Http\Middleware;
use modelos\productos;
use Closure;

class ChecarProducto
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $prod=new productos;
        $prod=productos::find($request->nombre_p);
        if($prod->exists()){
           return $next($request);
        }
        return abort(400,"Existe un producto con el mismo nombre. Cree otro.");
    }
}
