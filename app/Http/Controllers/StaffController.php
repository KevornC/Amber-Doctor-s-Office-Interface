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
        Session()->flush('staff');

        return redirect()->route('login');
    }
}
