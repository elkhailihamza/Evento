<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    @vite('resources/css/app.css')
    <title>Document</title>
</head>

<body>
    @include('layouts.components.navbar')
    @include('layouts.components.sidebar')
    @yield('content')
</body>

<footer class="bg-[#000000] h-20">
    <div class="flex justify-center items-center text-white h-full">
        <span>©2024 YouEvento, Inc. All rights reserved.</span>
    </div>
</footer>
@vite('resources/js/categories.js')
@vite('resources/js/fetchEvents.js')
@vite('resources/js/search.js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>

</html>