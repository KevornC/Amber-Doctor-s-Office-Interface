<?php

namespace App\Http\Livewire;

use LivewireUI\Modal\ModalComponent;

class SuccessNotification extends ModalComponent
{
    public function close(){
        $this->emit('closeModal');
        $this->emit('closeModal','live-add-staff');
        return redirect()->route('staff');
    }
    public static function closeModalOnEscape(): bool
    {
        return false;
    }
    public function render()
    {
        return view('livewire.success-notification');
    }
}
