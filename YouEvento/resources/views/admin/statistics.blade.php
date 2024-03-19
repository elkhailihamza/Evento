@extends('admin.layouts.app')

@section('content')

<section class="flex justify-center items-center mb-20">
    <div class="w-4/5 mt-10">
        <h3 class="text-3xl">Statistics:</h3>
    </div>
</section>

<section class="flex gap-2 justify-center mt-10 select-none">
    <div>
        <div class="p-5 mb-3 text-[26px] border rounded shadow-sm text-center">
            <h2 class="font-medium">Total Events:</h2>
            <span class="font-semibold">{{$events}}</span>
        </div>
        <div class="p-5 text-[26px] border shadow-sm text-center">
            <h2 class="font-medium">Total Reservations:</h2>
            <span class="font-semibold">{{$reservations}}</span>
        </div>
    </div>
    <div>
        <div class="p-5 mb-3 text-[26px] border rounded shadow-sm text-center">
            <h2 class="font-medium">Total Users:</h2>
            <span class="font-semibold">{{$users}}</span>
        </div>
        <div class="p-5 text-[26px] border shadow-sm text-center">
            <h2 class="font-medium">Total Tickets:</h2>
            <span class="font-semibold">{{$tickets}}</span>
        </div>
    </div>
</section>

@endsection