<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class doctorMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(Session()->has('doctor')){
            $url = 'http://192.168.0.15:8080/api/system/status';

            $curlHandler = curl_init();
            
            curl_setopt($curlHandler,CURLOPT_URL,$url);
            curl_setopt($curlHandler,CURLOPT_RETURNTRANSFER,true);

            $result = curl_exec($curlHandler);
            $result = json_decode($result,true);
            curl_close($curlHandler);
            
            if($result==null){
                Session()->put('systemDown','Yes');
                Session()->put('tempSystemDown','Yes');
                return redirect()->route('systemDown');

            }

            return $next($request);
        }

        return redirect()->route('login');
    }
}
