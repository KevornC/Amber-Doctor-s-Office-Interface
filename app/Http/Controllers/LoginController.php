<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    //

    public function login(){
        $url = 'http://192.168.0.4:8080/api/system/status';

        $curlHandler = curl_init();
        
        curl_setopt($curlHandler,CURLOPT_URL,$url);
        curl_setopt($curlHandler,CURLOPT_RETURNTRANSFER,true);

        $result = curl_exec($curlHandler);
        $result = json_decode($result,true);
        curl_close($curlHandler);
        
        if($result==null){
            Session()->put('systemDown','Yes');
        }elseif($result['status']=='200'){
                Session()->pull('systemDown');
        }

        if(Session()->has('doctor')){
            return redirect()->route('doctorDashboard');
        }elseif(Session()->has('staff')){
            return redirect()->route('staffDashboard');
        }
        return view('login');
    }
    public function resetPassword(Request $request,$id){
        if (! $request->hasValidSignature()) {
            abort(404);
        }
            Session()->put('userTempResetPasswordID',$id);
            return view('resetPassword.resetPassword');
        
    }
}
