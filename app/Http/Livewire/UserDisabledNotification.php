<?php

namespace App\Http\Livewire;

use Livewire\Component;

class UserDisabledNotification extends Component
{
    public function close(){
        $this->emit('closeModal');
        if(session()->has('staff')){
            Session()->pull('staff');
            Session()->pull('userID');
        }
        Session()->pull('tempUserDisabled');
        return redirect()->route('homepage');
    }
    public function render()
    {
        return view('livewire.user-disabled-notification');
    }
}
