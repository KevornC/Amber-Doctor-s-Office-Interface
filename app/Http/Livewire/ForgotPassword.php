<?php

namespace App\Http\Livewire;

use LivewireUI\Modal\ModalComponent;

use App\Mail\forgotPasswordMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
 

class ForgotPassword extends ModalComponent
{
    public $email;

    protected $rules = [
        'email'=>'required | email'
    ];

    public function updated($propertyName){
        return $this->validateOnly($propertyName);
    }

    public function sendEmail(){
        $this->validate();
        
        $url = 'http://192.168.0.15:8080/api/forgot/password/'.$this->email;
        $curlHandler = curl_init();
        
        curl_setopt($curlHandler,CURLOPT_URL,$url);
        curl_setopt($curlHandler,CURLOPT_RETURNTRANSFER,true);

        $result = curl_exec($curlHandler);
        curl_close($curlHandler);
        $result=json_decode($result,true);
        if($result['message']=='Search Failed'){
            Session()->put('notFound','Credential Not Found');
        }elseif($result['message']=='Search Successfully'){
            $id=$result['record']['id'];
            $link=URL::temporarySignedRoute(
                'resetPassword', now()->addMinutes(1), ['id' => $id]
            );  
            Mail::to('kevorn.callum16@gmail.com')->send(new forgotPasswordMail($link));
            $this->emit('openModal', 'forgot-password-notification');
        }

    }

    public function closeFPModal(){
        $this->emit('closeModal','forgot-password');
    }

    public function closeNotFoundAlert(){
        Session()->pull('notFound');
    }

    public static function closeModalOnEscape(): bool
    {
        return false;
    }
    public function render()
    {
        return view('livewire.forgot-password');
    }
}
