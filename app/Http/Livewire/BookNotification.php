<?php

namespace App\Http\Livewire;


use LivewireUI\Modal\ModalComponent;

class BookNotification extends ModalComponent
{
    public function close(){
        $this->emit('closeModal');
        $this->emit('closeModal','book-appointment');
    }
    public static function closeModalOnEscape(): bool
    {
        return false;
    }
    public function render()
    {
        return view('livewire.book-notification');
    }
}
