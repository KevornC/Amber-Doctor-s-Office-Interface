<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DoctorController extends Controller
{
    //
    public function home(){

        $url='http://192.168.0.15:8080/api/doctor/dashboard';
        
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

        // dd($result);
      
        curl_close($curlHandler);

        return view('Doctor.dashboard',compact('result'));
    }
    public function staff(){
        return view('Doctor.staff');
    }

    public function allAppointments(){
        return view('Doctor.allAppointments');
    }



    public function logout(){
        $url = 'http://192.168.0.15:8080/api/logout';

        $curlHandler = curl_init();
        
        curl_setopt($curlHandler,CURLOPT_URL,$url);
        curl_setopt($curlHandler,CURLOPT_RETURNTRANSFER,true);

        $result = curl_exec($curlHandler);
        $result = json_decode($result,true);
        curl_close($curlHandler);
        Session()->flush('token');
        Session()->flush('doctor');
        return redirect()->route('login');
    }
}
