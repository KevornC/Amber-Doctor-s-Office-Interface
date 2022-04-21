<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DoctorController extends Controller
{
    //
    public function home(){
        $url='http://192.168.0.4:8080/api/doctor/dashboard';

        $curlHandler = curl_init();

        curl_setopt($curlHandler,CURLOPT_URL,$url);
        curl_setopt($curlHandler,CURLOPT_RETURNTRANSFER,true);

        $result = curl_exec($curlHandler);
        $result = json_decode($result,true);
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
        Session()->flush('doctor');
        return redirect()->route('login');
    }
}
