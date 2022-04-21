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

        $url='http://192.168.0.4:8080/api/update/password';

        $ch = curl_init();

        $data = array(
            'id'=>$userID,
            'password'=>$this->password
        );

        $data = http_build_query($data);

        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_POST,true);
        curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

        $result = curl_exec($ch);

        curl_close($ch);
        $this->emit('openModal','update-password-notification');
        return redirect()->route('staffDashboard');
        
    }
    public function render()
    {
        return view('livewire.update-password');
    }
}