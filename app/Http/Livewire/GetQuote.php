<?php

namespace App\Http\Livewire;

use LivewireUI\Modal\ModalComponent;
use App\Mail\getQuoteMail;
use Illuminate\Support\Facades\Mail;

class GetQuote extends ModalComponent
{
    public $fullName, $email, $message;

    protected $rules = [
        'fullName'=>'required | min:4',
        'email'=>'required | regex:/(.+)@(.+)\.(.+)/i',
        'message'=>'required | min:10'
    ];
    public function updated($propertyName){
        return $this->validateOnly($propertyName);
    }

    public function sendMsg(){
        $this->validate();
        $details = [
            'fullname'=>$this->fullName,
            'email'=>$this->email,
            'message'=>$this->message
        ];

        Mail::to('kevorn.callum16@gmail.com')->send(new getQuoteMail($details));
        $this->emit('openModal', 'notification');

    }
    public static function closeModalOnEscape(): bool
    {
        return false;
    }

    public function render()
    {
        return view('livewire.get-quote');
    }
}
