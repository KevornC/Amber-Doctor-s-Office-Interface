@extends('layouts\app')

@section('title')
Amber Doctor's office
@endsection

@section('content')
<div class="h-full ml-14 mt-14 mb-10 md:ml-64">
<livewire:live-all-appointments />
</div>
@endsection