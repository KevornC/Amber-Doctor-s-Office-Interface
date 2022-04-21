<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Amber Doctor's Office</title>
    <link rel="icon" href="{{url('/icon/icon.png')}}">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    @livewireStyles()
</head>
<body>
    <livewire:live-login />

    @livewire('livewire-ui-modal')
    @livewireScripts
</body>
</html>