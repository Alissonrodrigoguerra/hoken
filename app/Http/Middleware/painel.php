<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class painel
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
       
        if(Auth::user() !== null){
            if(Auth::user()->idCargo !== 1){      
                
                
                config(['adminlte.menu.21' => '']);
                config(['adminlte.menu.20' => '']);
                config(['adminlte.menu.19' => '']);
                config(['adminlte.menu.18' => '']);
                config(['adminlte.menu.17' => '']);
                config(['adminlte.menu.16' => '']);
                config(['adminlte.menu.15' => '']);
                config(['adminlte.menu.14' => '']);
                config(['adminlte.menu.13' => '']);
                config(['adminlte.menu.12' => '']); 
                config(['adminlte.menu.11' => '']); 
                config(['adminlte.menu.10' => '']); 
                config(['adminlte.menu.9' => '']); 
                
            }
        }
        if(Auth::user() !== null){
            if(Auth::user()->idCargo == 3){

                config(['adminlte.menu.21' => '']);
                config(['adminlte.menu.20' => '']);
                config(['adminlte.menu.19' => '']);
                config(['adminlte.menu.18' => '']);
                config(['adminlte.menu.17' => '']);
                config(['adminlte.menu.16' => '']);
                config(['adminlte.menu.15' => '']);
                config(['adminlte.menu.14' => '']);
                config(['adminlte.menu.12' => '']);
                config(['adminlte.menu.11' => '']);
                config(['adminlte.menu.10' => '']); 
                config(['adminlte.menu.9' => '']); 
                config(['adminlte.menu.8' => '']); 
                config(['adminlte.menu.7' => '']); 
                config(['adminlte.menu.6' => '']); 
                config(['adminlte.menu.5' => '']); 
                config(['adminlte.menu.4' => '']); 
                config(['adminlte.menu.3' => '']);
                config(['adminlte.menu.2' => '']); 

        }
        }

        
        return $next($request);
    }
}
