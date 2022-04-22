<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class staffMiddleware
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
        if(Session()->has('staff')){
            $url = 'http://192.168.0.15:8080/api/system/status';

            $curlHandler = curl_init();
            
            curl_setopt($curlHandler,CURLOPT_URL,$url);
            curl_setopt($curlHandler,CURLOPT_RETURNTRANSFER,true);

            $result = curl_exec($curlHandler);
            $result = json_decode($result,true);
            curl_close($curlHandler);
            
            if($result==null){
                Session()->put('tempSystemDown','Yes');
                Session()->put('systemDown','Yes');
                return redirect()->route('systemDown');
                
            }
            
            $id = session()->get('userID');
            
            $statusUrl = 'http://192.168.0.15:8080/api/staff/status/'.$id;
            
            $curlHandler = curl_init();

            $token =Session()->get('token');
            $headers = array(
                "Accept: application/json",
                'Authorization: Bearer '.$token
            );
            
            curl_setopt($curlHandler,CURLOPT_URL,$statusUrl);
            curl_setopt($curlHandler,CURLOPT_RETURNTRANSFER,true);
            curl_setopt($curlHandler, CURLOPT_HTTPHEADER, $headers);
    
            $status = curl_exec($curlHandler);
            $status = json_decode($status,true);
            curl_close($curlHandler);
            if($status['message']=='User Disabled'){
                Session()->put('tempUserDisabled','Yes');
                return redirect()->route('userDisabled');
            }

            return $next($request);
        }

        return redirect()->route('login');
    }
}
