@extends('layouts.staff')

@section('title')
dashboard
@endsection

@section('content')
<div class="container mx-auto px-4 sm:px-8">
    <div class="py-8">
        <div>
            <h2 class="text-2xl font-semibold leading-tight">Amber Doctor's Office For Today Appointments</h2>
        </div>
        {{-- <form > --}}
        <div class="my-2 flex sm:flex-row flex-col">
            
            <div class="flex flex-row ml-4">
                <div class="relative">
                    <form wire:submit.prevent="search()">
                        <div class="my-2 flex sm:flex-row flex-col">
                            <div class="flex flex-row mb-1 sm:mb-0">
                                <div class="relative">
                                   <input class="outline-none border-b-2 border-black focus:outline-none focus:shadow" type='tel' pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="Enter telephone search..." wire:model='searchItem' />
                                   @error('searchItem')
                                       <p class='text-xs text-red-500 italic'>
                                           {{$message}}
                                       </p>
                                   @enderror
                                </div>
                        
                                <div class="relative">
                                    <button type="submit" class='appearance-none h-full  sm:rounded-md rounded-md block w-full border-gray-400 text-white ml-2 py-2 px-4  leading-tight focus:outline-none hover:bg-red-600 bg-blue-900 focus:border-gray-500'>Search</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
    </div>
    <livewire:live-appointments />
@endsection