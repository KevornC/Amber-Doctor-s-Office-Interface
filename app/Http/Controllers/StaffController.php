<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaffController extends Controller
{
    //
    public function home(){
        return view('Staff.dashboard');
    }
    public function allAppointments(){
        return view('Staff.allAppointments');
    }
    public function updatePassword(){
        return view('Staff.updatePassword');
    }

    public function logout(){
        $url = 'http://192.168.0.15:8080/api/logout';

        $curlHandler = curl_init();
        $token =Session()->get('token');
        $headers = array(
            "Accept: application/json",
            'Authorization: Bearer '.$token
         );
         
         curl_setopt($curlHandler,CURLOPT_URL,$url);
         curl_setopt($curlHandler,CURLOPT_RETURNTRANSFER,true);
         curl_setopt($curlHandler, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($curlHandler);
        $result = json_decode($result,true);
        curl_close($curlHandler);
        Session()->flush('staff');

        return redirect()->route('login');
    }
}
