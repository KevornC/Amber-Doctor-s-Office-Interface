<?php

namespace App\Http\Livewire;

use LivewireUI\Modal\ModalComponent;

class UpdatePasswordNotification extends ModalComponent
{

    public static function closeModalOnEscape(): bool
    {
        return false;
    }
    public function render()
    {
        return view('livewire.update-password-notification');
    }
}
