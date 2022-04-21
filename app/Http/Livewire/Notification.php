<?php

namespace App\Http\Livewire;

use LivewireUI\Modal\ModalComponent;

class Notification extends ModalComponent
{
    public function close(){
        $this->emit('closeModal');
        $this->emit('closeModal','notification');
    }
    public static function closeModalOnEscape(): bool
    {
        return false;
    }
    public function render()
    {
        return view('livewire.notification');
    }
}
