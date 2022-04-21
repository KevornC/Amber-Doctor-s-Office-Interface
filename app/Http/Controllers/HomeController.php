<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function home(){
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

        return view('welcome');
    }

    public function systemDown(){
        return view('SystemDown.systemDown');
    }

    public function userDisabled(){
        return view('UserDisabled.userDisabled');
    }

}
