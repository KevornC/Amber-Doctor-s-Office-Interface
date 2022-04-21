<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>
    <link rel="icon" href="{{url('/icon/icon.png')}}">
    <link href="{{url('/css/tailwind.css')}}" rel="stylesheet" type="text/css">
    <link href="{{url('/css/app.css')}}" rel="stylesheet" type="text/css">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    @livewireStyles
    
    <!-- Scripts -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
  </head>
  <body class="bg-white">
    <div class="flex justify-center w-screen h-screen items-center">
        <livewire:system-down-middleware-notification /> 
    </div>
    @livewire('livewire-ui-modal')
    @livewireScripts
  </body>
  </html>