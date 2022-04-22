<?php

namespace App\Http\Livewire;

use Livewire\Component;

class LiveAppointments extends Component
{
    public $firstName,$lastName,$phoneNumber,$appointmentDate,$subject,$reason;
    public $time,$editMode = false,$appointmentID,$statusChanged;
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

    public function clearFields(){
        $this->firstName = '';
        $this->lastName = '';
        $this->phoneNumber = '';
        $this->appointmentDate = '';
        $this->time = '';
        $this->subject = '';
        $this->reason = '';
    }

    public function editAppointment($editID){
        $url = 'http://192.168.0.15:8080/api/edit/appointment/'.$editID;

        $curlHandler = curl_init();

        $token =Session()->get('token');
        $headers = array(
            "Accept: application/json",
            'Authorization: Bearer '.$token
         );
         
         curl_setopt($curlHandler,CURLOPT_URL,$url);
         curl_setopt($curlHandler,CURLOPT_RETURNTRANSFER,true);
         curl_setopt($curlHandler, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($curlHandler);
        $result = json_decode($result,true);
        $result = $result['appointment'];
        $this->appointmentID = $result['id'];
        $this->firstName = $result['firstName'];
        $this->lastName =  $result['lastName'];
        $this->phoneNumber =  $result['tel'];
        $this->appointmentDate =  $result['appointmentDate'];
        $this->time =  $result['time'];
        $this->subject =  $result['subject'];
        $this->reason =  $result['reason'];

        $this->editMode = true;

        curl_close($curlHandler);
    }

    public function updateAppointment(){
        $this->validate();

        $id = $this->appointmentID;

        $userID = Session()->get('userID');
        $data = array(
            'firstName'=>$this->firstName,
            'lastName'=>$this->lastName,
            'phoneNumber'=>$this->phoneNumber,
            'appointmentDate'=>$this->appointmentDate,
            'time'=>$this->time,
            'subject'=>$this->subject,
            'reason'=>$this->reason,
        );

        $information=http_build_query($data);
        $url = 'http://192.168.0.15:8080/api/update/appointment/'.$userID.'/'.$id;

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
        if($result['status']==200){
            $this->emit('openModal','live-edit-appointment-notification');
            $this->clearFields();
            $this->editMode = false;
        }

    }

    public function cancel(){
        $this->clearFields();
        $this->editMode = false;
    }

    public function status(){
        $string = $this->statusChanged;
        $id = intval(substr($string, -1)); 
        $status = str_replace($id, '', $string);
        $userID = Session()->get('userID');
        $data = array(
            'userID'=>$userID,
            'id'=>$id,
            'status'=>$status
        );

        $information=http_build_query($data);
        $url = 'http://192.168.0.15:8080/api/update/status';

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
        $this->statusChanged='';
    }

    public function render()
    {
        if($this->statusChanged!=''){
            $this->status();
        }

        $url='http://192.168.0.15:8080/api/doctor/dashboard';


        $curlHandler = curl_init();
        $token =Session()->get('token');
        $headers = array(
            "Accept: application/json",
            'Authorization: Bearer '.$token
         );
         curl_setopt($curlHandler,CURLOPT_URL,$url);
         curl_setopt($curlHandler,CURLOPT_RETURNTRANSFER,true);
         curl_setopt($curlHandler, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($curlHandler);
        $result = json_decode($result,true);
        curl_close($curlHandler);
        return view('livewire.live-appointments',compact('result'));
    }
}
