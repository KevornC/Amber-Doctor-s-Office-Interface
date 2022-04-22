<?php

namespace App\Http\Livewire;

use Livewire\Component;

class LiveLogin extends Component
{
    public $email,$password;

    protected $rules = [
        'email'=>'required | email',
        'password'=>'required'
    ];

    public function updated($propertyName){
        return $this->validateOnly($propertyName);
    }

    public function clearProperties(){
        $this->email='';
        $this->password='';
    }

    public function login(){
        $data = $this->validate();

        $information=http_build_query($data);
        $url = 'http://192.168.0.15:8080/api/login';

        $curlHandler = curl_init();

        $headers = array(
            "Accept: application/json",
         );
        
        curl_setopt($curlHandler,CURLOPT_URL,$url);
        curl_setopt($curlHandler,CURLOPT_POST,true);
        curl_setopt($curlHandler,CURLOPT_POSTFIELDS,$information);
        curl_setopt($curlHandler,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($curlHandler, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($curlHandler);
        // dd($result);
        $result = json_decode($result,true);
        curl_close($curlHandler);
        
        if($result['message']=='Login Failed'){
            Session()->flash('loginFailed','Invalid Credentials');
        }
        if($result['message']=='Login Successful'){
            Session()->put('userID',$result['id']);
            Session()->put('token',$result['token']);
            if($result['role']=='doctor'){
                Session()->put('doctor',$result['role']);
                return redirect()->route('doctorDashboard');
            }
            if($result['role']=='staff'){
                Session()->put('staff',$result['role']);
                if($result['userStatus']=='Active'){
                    return redirect()->route('staffDashboard');
                }
                if($result['userStatus']=='newlyOpened'){
                    Session()->put('staff',$result['role']);
                    Session()->put('userResetPasswordID',$result['id']);
                    return redirect()->route('updateStaffPassword');
                }
                if($result['userStatus']=='Password Changed'){
                    Session()->put('staff',$result['role']);
                    Session()->put('userResetPasswordID',$result['id']);
                    return redirect()->route('updateStaffPassword');
                }
            }
            $this->clearProperties();
        }
        if($result['message']=='User Disabled'){
            Session()->flash('loginFailed','Invalid Credentials');
        }

    }

    public function forgotPassword(){
        $this->emit('openModal','forgot-password');
    }

    public function closePasswordChangedAlert(){
        Session()->pull('passwordChanged');
    }
    public function closeLoginFailedAlert(){
        Session()->pull('loginFailed');
    }
    public function render()
    {
        return view('livewire.live-login');
    }
}
