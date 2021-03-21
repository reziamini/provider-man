<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet" type="text/css">
    @livewireStyles
    <title>Provider Manager</title>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.1/dist/alpine.min.js" defer></script>
</head>
<body class="bg-gray-100 font-mono">

<h1 class="mt-12 text-center text-gray-700 text-4xl">
    Provider Manager
</h1>

<div class="flex justify-center">
    <div class="container mt-10">
        {{ $slot }}
    </div>
</div>
    @livewireScripts
</body>
</html>
