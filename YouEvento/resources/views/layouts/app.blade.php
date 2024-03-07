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
    @can('viewOriganizerComponent', \App\Models\User::class)
        @include('layouts.components.sidebar')
        @vite('resources/js/categories.js')
        @vite('resources/js/fetchEvents.js')
    @endcan
    @yield('content')
</body>
@vite('resources/js/search.js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>

</html>