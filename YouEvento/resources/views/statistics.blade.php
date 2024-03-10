@extends('layouts.app')

@section('content')

<section>
    <div class="flex justify-center w-1/2 items-center">
        <h3 class="text-3xl">Statistics:</h3>
    </div>
</section>
<section class="flex justify-evenly mt-10">
    <div class="w-[350px] rounded-md border p-2">
        <div class="flex h-[300px] justify-center mb-3">
            <img src="{{ asset('storage/'.$event->cover) }}">
        </div>
        <div>
            <h2 class="truncate">Title: {{$event->title}}</h2>
            <h2 class="truncate">Validation: {{$event->automated}}</h2>
            <p class="truncate">Reserved on: {{$event->created_at->diffForHumans()}}</p>
        </div>
    </div>
    <div class="mt-10">
        @foreach ($event->tickets as $ticket)
        <span class="block">
            <span class="font-bold">Ticket Type:</span>
            {{$ticket->ticket_name.': '.$ticket->ticket_price.' DH'}}
        </span>

        <span class="block">
            <span class="font-bold">Total Reservations:</span>
            {{$ticket->ticket_name.': '.$ticket->reservations->count()}}
        </span>

        <span class="block">
            <span class="font-bold">S:</span>
            {{$ticket->ticket_name.': '.$ticket->reservations->count()}}
        </span>
        @endforeach
    </div>
</section>

@endsection