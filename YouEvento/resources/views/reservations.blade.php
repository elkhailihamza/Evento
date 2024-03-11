@extends('layouts.app')

@section('content')
<section>
    <div class="text-center w-1/2">
        <h1 class="text-[28px]">Reservations:</h1>
    </div>
</section>
<section class="flex flex-wrap justify-center gap-5 mt-10 select-none">
    @foreach ($reservations as $reservation)
    <div class="w-[350px] rounded-md border p-2">
        <div class="flex h-[300px] justify-center mb-3">
            <img src="{{ asset('storage/'.$reservation->ticket->event->cover) }}">
        </div>
        <div>
            <h2 class="truncate">Title: {{$reservation->ticket->event->title}}</h2>
            <h2 class="truncate">Info: {{$reservation->info ?? 'No Info Given!'}}</h2>
            <h2 class="truncate">Ticket: {{$reservation->ticket->ticket_name}}</h2>
            <h2 class="truncate">Status:
                @if ($reservation->status == 1)
                Pending..
                @else
                Confirmed!
                @endif
            </h2>
            <p class="truncate">Reserved on: {{$reservation->created_at->diffForHumans()}}</p>
            <div class="flex justify-center mt-5">
                @if ($reservation->status)
                <a href="{{route('tickets.download')}}" class="bg-red-700 py-1 px-2 text-white ">Download!</a>
                @else
                <a class="bg-black py-1 px-2 text-white">Awating..</a>
                @endif
            </div>
        </div>
    </div>
    @endforeach
</section>

@endsection