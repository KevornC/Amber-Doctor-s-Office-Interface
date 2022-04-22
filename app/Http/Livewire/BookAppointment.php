<?php

namespace App\Http\Livewire;


use LivewireUI\Modal\ModalComponent;
use Carbon\Carbon;

class BookAppointment extends ModalComponent
{
    public $firstName,$lastName,$phoneNumber,$appointmentDate,$subject,$reason;
    public $time;
    protected $rules = [
        'firstName'=>'required | min:2',
        'lastName'=>'required | min:2',
        'phoneNumber'=>'required | regex:/^\d{3}[-]\d{3}[-]\d{4}$/',
        'appointmentDate'=>'required | after_or_equal:today',
        'time'=>'required',
        'subject'=>'required | min:3',
        'reason'=>'required'
    ];

    public function updated($propertyName){
        return $this->validateOnly($propertyName);
    }

    public function setAppointment(){
        $data = $this->validate();

        $information=http_build_query($data);
        $url = 'http://192.168.0.15:8080/api/set/appointment';

        $curlHandler = curl_init();
        
        curl_setopt($curlHandler,CURLOPT_URL,$url);
        curl_setopt($curlHandler,CURLOPT_POST,true);
        curl_setopt($curlHandler,CURLOPT_POSTFIELDS,$information);
        curl_setopt($curlHandler,CURLOPT_RETURNTRANSFER,true);

        $result = curl_exec($curlHandler);

        curl_close($curlHandler);
        $result = json_decode($result,true);
        if($result['status']==201){
            $this->emit('openModal','book-notification');
        }
        if($result['status']==200){
            session()->flash('error','Time Slot Unavailable');
        }

    }

    public function closeAlert(){
        Session()->pull('error');
    }
    public static function closeModalOnEscape(): bool
    {
        return false;
    }
    public function render()
    {
        return view('livewire.book-appointment');
    }
}
