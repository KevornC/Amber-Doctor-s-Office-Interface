<?php

namespace App\Http\Livewire;

use LivewireUI\Modal\ModalComponent;

class LiveAddStaff extends ModalComponent
{
    public $name,$email;

    protected $rules = [
        'name'=>'required',
        'email'=>'required | email'
    ];

    public function updated($propertyName){
        return $this->validateOnly($propertyName);
    }

    public function generateStaff(){
        $data = $this->validate();

        $information=http_build_query($data);
        $url = 'http://192.168.0.15:8080/api/staff/create';

        $curlHandler = curl_init();

        $token =Session()->get('token');
        $headers = array(
            "Accept: application/json",
            'Authorization: Bearer '.$token
         );
         
         curl_setopt($curlHandler,CURLOPT_URL,$url);
         curl_setopt($curlHandler,CURLOPT_POST,true);
         curl_setopt($curlHandler,CURLOPT_POSTFIELDS,$information);
         curl_setopt($curlHandler,CURLOPT_RETURNTRANSFER,true);
         curl_setopt($curlHandler, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($curlHandler);
        $result = json_decode($result,true);

        curl_close($curlHandler);
        if($result['status']==201){
            $this->emit('openModal','success-notification');
        }
        if($result['status']==200){
            session()->flash('error','Email Already Exist');
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
        return view('livewire.live-add-staff');
    }
}
