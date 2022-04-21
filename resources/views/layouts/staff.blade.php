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
      
<nav class="bg-blue-600 border-gray-200 px-2 sm:px-4 py-2.5 dark:bg-gray-800">
    <div class="container flex flex-wrap justify-between items-center mx-auto">
    <a href="{{route('staffDashboard')}}" class="flex items-center">
    <img src="/icon/icon.png" class="mr-3 h-6 sm:h-9" alt="Amber Doctor's Office Logo">
    <span class="self-center text-xl text-white font-semibold whitespace-nowrap dark:text-white">Amber Doctor's Office</span>
    </a>
    <div class="">
    <ul class="flex flex-col mt-4 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium">
    <li>
    <a href="{{route('staffDashboard')}}" class="block py-2 pr-4 pl-3 text-blue-600 rounded-2xl hover:bg-primary-500 bg-white" aria-current="page">Home</a>
    </li>
    <li>
    <a href="{{route('allStaffAppointments')}}" class="block py-2 pr-4 pl-3 text-blue-600 rounded-2xl hover:bg-primary-500 bg-white" aria-current="page">All Appointments</a>
    </li>
    <li>
    <a href="{{route('staffLogout')}}" class="block py-2 pr-4 pl-3 text-gray-600 rounded-2xl hover:bg-white hover:text-red-700">Logout</a>
    </li>
    </ul>
    </div>
    </div>
    </nav>
    @yield('content')   
    @livewire('livewire-ui-modal')
    @livewireScripts
  </body>
  </html>