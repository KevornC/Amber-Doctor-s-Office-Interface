<?php

namespace App\Http\Livewire;

use LivewireUI\Modal\ModalComponent;

class LiveEditAppointmentNotification extends ModalComponent
{
    public function close(){
        $this->emit('closeModal');
    }
    public static function closeModalOnEscape(): bool
    {
        return false;
    }
    public function render()
    {
        return view('livewire.live-edit-appointment-notification');
    }
}
