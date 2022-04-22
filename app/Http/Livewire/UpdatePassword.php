<?php

namespace App\Http\Livewire;

use Livewire\Component;

class UpdatePassword extends Component
{
    public $userId,$password,$passwordConfirmation;

    protected $rules = [
        'password'=>'required | min:8',
        'passwordConfirmation'=>'same:password'
    ];

    public function updated($propertyName){
        return $this->validateOnly($propertyName);
    }
    public function changePassword(){
        $this->validate();

        $userID=Session()->get('userResetPasswordID');

        $url='http://192.168.0.15:8080/api/update/password';

        $curlHandler = curl_init();

        $data = array(
            'id'=>$userID,
            'password'=>$this->password
        );

        $data = http_build_query($data);

        $token =Session()->get('token');
        $headers = array(
            "Accept: application/json",
            'Authorization: Bearer '.$token
         );
         
         curl_setopt($curlHandler,CURLOPT_URL,$url);
         curl_setopt($curlHandler,CURLOPT_POST,true);
         curl_setopt($curlHandler,CURLOPT_POSTFIELDS,$data);
         curl_setopt($curlHandler,CURLOPT_RETURNTRANSFER,true);
         curl_setopt($curlHandler, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($curlHandler);

        curl_close($curlHandler);
        $this->emit('openModal','update-password-notification');
        return redirect()->route('staffDashboard');
        
    }
    public function render()
    {
        return view('livewire.update-password');
    }
}
