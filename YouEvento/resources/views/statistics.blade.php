@extends('layouts.app')

@section('content')

<section>
    <div class="flex justify-center w-1/2 items-center">
        <h3 class="text-3xl">Statistics:</h3>
    </div>
</section>
<section class="flex flex-wrap justify-evenly gap-5 mt-10">
    <div class="w-[350px] rounded-md border p-2">
        <div class="flex h-[300px] justify-center">
            <img src="{{ asset('storage/'.$event->cover) }}">
        </div>
        <div>
            <h2 class="truncate">Title: {{$event->title}}</h2>
            <h2 class="truncate">Validation: {{$event->automated}}</h2>
            <p class="truncate">Reserved on: {{$event->created_at->diffForHumans()}}</p>
        </div>
    </div>
    <div>
        <h1 class="font-bold text-[26px]">Tickets:</h1>
        <hr>
        @php
        $total = 0;
        @endphp
        <div class="flex flex-wrap gap-10 mt-5">
            @foreach ($event->tickets as $ticket)
            <div class="mb-2">
                <span class="font-medium text-[26px]">{{$ticket->ticket_name}}:</span>
                <hr>
                <span class="block">
                    <span class="font-medium">Ticket Price:</span>
                    {{$ticket->ticket_price.' DH'}}
                </span>

                <span class="block">
                    <span class="font-medium">Total Reservations:</span>
                    @php
                    $ticketReservations = $ticket->reservations->count();
                    $total += $ticketReservations;
                    @endphp
                    {{$ticketReservations}}

                </span>
            </div>
            @endforeach
        </div>
        <h1 class="font-bold text-[26px] mt-5">Total:</h1>
        <hr>
        <div>
            <span class="font-medium">Reservations:</span>
            {{$total}}
        </div>
        <div>
            <span class="font-medium">Tickets:</span>
            {{$event->tickets->count()}}
        </div>
    </div>
</section>

@endsection