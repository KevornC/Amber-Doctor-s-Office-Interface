<?php

namespace App\Http\Livewire;

use LivewireUI\Modal\ModalComponent;

class ForgotPasswordNotification extends ModalComponent
{

    public function close(){
        $this->emit('closeModal');
        $this->emit('closeModal','forgot-password');
    }
    public static function closeModalOnEscape(): bool
    {
        return false;
    }
    public function render()
    {
        return view('livewire.forgot-password-notification');
    }
}
