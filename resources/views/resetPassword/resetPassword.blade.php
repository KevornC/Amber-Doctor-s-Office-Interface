<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Amber Doctor's Office</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <script>
        INTERVAL = 60    // seconds
        STOP_AFTER = 60 // seconds

        // At every 5 seconds, reload the page
        timer1 = setInterval(() => {
            window.location.reload();
        },INTERVAL*1000)

        // Stop reloading after 15 seconds
        setTimeout(() => clearInterval(timer1), STOP_AFTER*1000)
        </script>
    @livewireStyles()
</head>
<body>
    <livewire:reset-password />

    @livewire('livewire-ui-modal')
    @livewireScripts
</body>
</html>