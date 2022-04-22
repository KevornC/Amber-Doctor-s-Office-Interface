<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Hash;

class LiveStaff extends Component
{
    use WithPagination;

    public $searchMode=false,$searchItem,$search;

    public $staffID,$name,$email,$editMode=false;

    protected $rules = [
        'name'=>'required',
        'email'=>'required | email',
    ];

    public function updated($propertyName){
        return $this->validateOnly($propertyName);
    }
    public function clearEditFields(){
        $this->name='';
        $this->email='';
    }
    public function updateStaff(){
        $data=$this->validate();

        $url = 'http://192.168.0.15:8080/api/staff/update/'.$this->staffID;
        $curlHandler=curl_init();

        $information = http_build_query($data);

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

        $results = curl_exec($curlHandler);
        $results = json_decode($results,true);

        $this->emit('openModal','success-notification');

        $this->editMode = false;
        $this->clearEditFields();
    }

    public function updatePassword($id){
        $url='http://192.168.0.15:8080/api/staff/update/password/'.$id;
        
        $curlHandler = curl_init();

        $token =Session()->get('token');
        $headers = array(
            "Accept: application/json",
            'Authorization: Bearer '.$token
         );
         
         curl_setopt($curlHandler,CURLOPT_URL,$url);
         curl_setopt($curlHandler,CURLOPT_RETURNTRANSFER,true);
         curl_setopt($curlHandler, CURLOPT_HTTPHEADER, $headers);
        
        curl_exec($curlHandler);

        curl_close($curlHandler);
    }
    public function enableStaff($id){

        $url='http://192.168.0.15:8080/api/staff/enable/'.$id;

        $curlHandler = curl_init();

        $token =Session()->get('token');
        $headers = array(
            "Accept: application/json",
            'Authorization: Bearer '.$token
         );
         
         curl_setopt($curlHandler,CURLOPT_URL,$url);
         curl_setopt($curlHandler,CURLOPT_RETURNTRANSFER,true);
         curl_setopt($curlHandler, CURLOPT_HTTPHEADER, $headers);

        curl_exec($curlHandler);
        curl_close($curlHandler);
    }
    public function disableStaff($id){

        $url='http://192.168.0.15:8080/api/staff/disable/'.$id;

        $curlHandler = curl_init();

        $token =Session()->get('token');
        $headers = array(
            "Accept: application/json",
            'Authorization: Bearer '.$token
         );
         
         curl_setopt($curlHandler,CURLOPT_URL,$url);
         curl_setopt($curlHandler,CURLOPT_RETURNTRANSFER,true);
         curl_setopt($curlHandler, CURLOPT_HTTPHEADER, $headers);

        curl_exec($curlHandler);
        curl_close($curlHandler);
    }
    public function cancel(){
        $this->editMode = false;
        
    }
    public function clearField(){
        $this->searchItem = '';
    }
    
    
    public function search(){
        $this->validate([
            'searchItem'=>'required | email',
        ]);

        $url = 'http://192.168.0.15:8080/api/staff/search/'.$this->searchItem;
        $curlHandler=curl_init();

        $token =Session()->get('token');
        $headers = array(
            "Accept: application/json",
            'Authorization: Bearer '.$token
         );
         curl_setopt($curlHandler,CURLOPT_URL,$url);
         curl_setopt($curlHandler,CURLOPT_RETURNTRANSFER,true);
         curl_setopt($curlHandler, CURLOPT_HTTPHEADER, $headers);

        $results = curl_exec($curlHandler);
        curl_close($curlHandler);
        $results = json_decode($results,true);
        $this->search = $results['result'];
        $this->searchMode = true;
        $this->clearField();


    }
    public function returnBack(){
        $this->searchMode = false;
    }

    public function editStaff($id){
        $url = 'http://192.168.0.15:8080/api/staff/edit/'.$id;
        $curlHandler=curl_init();

        $token =Session()->get('token');
        $headers = array(
            "Accept: application/json",
            'Authorization: Bearer '.$token
         );
         
         curl_setopt($curlHandler,CURLOPT_URL,$url);
         curl_setopt($curlHandler,CURLOPT_RETURNTRANSFER,true);
         curl_setopt($curlHandler, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($curlHandler);
        $result=json_decode($result,true);
        $result = $result['staff'];
        $this->staffID=$result['id'];
        $this->name=$result['name'];
        $this->email=$result['email'];
        $this->editMode=true;
    }

    public function render()
    {
        $url = 'http://192.168.0.15:8080/api/staff/show';
        $curlHandler=curl_init();

        $token =Session()->get('token');
        $headers = array(
            "Accept: application/json",
            'Authorization: Bearer '.$token
         );
         
         curl_setopt($curlHandler,CURLOPT_URL,$url);
         curl_setopt($curlHandler,CURLOPT_RETURNTRANSFER,true);
         curl_setopt($curlHandler, CURLOPT_HTTPHEADER, $headers);

        $results = curl_exec($curlHandler);
        $results = json_decode($results,true);

        curl_close($curlHandler);
        // dd($results);
        $staff=$results['staff'];
        $staffCount=count($staff['data']);
        return view('livewire.live-staff',compact('staff','staffCount'));
    }
}