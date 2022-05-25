<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

class AuthSessionAdmin
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
        //EXPIRED  q
        // return  redirect('/expired');  
        //return $req;uest  
        //DB::table('at_cabo_usuario_cliente')->insert(['usuario' => "..".$request->path()]); 
        if( \Session::get('logueadoAdmin') ) {
     		 return $next($request);  
     	} else {
            if( $request->path() == 'dash') {
                return  redirect('/login');  
            } else {  
                return  redirect('/login'); 
            }
        }
 
        // abort(403, "No tienes autorización para ingresar.");
        // return response(   session()->get('logeadoo'), 401);
        // return  redirect('/actividades');  
        // return $request;
    }
}
 