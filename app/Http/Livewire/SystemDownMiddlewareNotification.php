<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SystemDownMiddlewareNotification extends Component
{
    public function close(){
        $this->emit('closeModal');
        if(session()->has('doctor')){
            Session()->pull('doctor');
            Session()->pull('userID');
        }
        if(session()->has('staff')){
            Session()->pull('staff');
            Session()->pull('userID');
        }
        Session()->pull('tempSystemDown');
        return redirect()->route('homepage');
    }
    public function render()
    {
        return view('livewire.system-down-middleware-notification');
    }
}
