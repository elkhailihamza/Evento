@extends('layouts.app')

@section('content')

<section class="flex justify-center">
    <div class="w-4/5">
        <a href="{{route('events')}}" class="text-[16px] w-20 opacity-50 hover:underline flex items-center"><svg class="mt-1" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                <path d="M19 12H6M12 5l-7 7 7 7" />
            </svg><span>Go back</span></a>
    </div>
</section>
<section class="flex justify-center mt-10 mb-10">
    <div class="flex justify-center lg:flex-nowrap flex-wrap w-3/4 mt-5 gap-3">
        <div class="lg:w-1/2 w-full flex justify-center">
            <img class="w-full md:max-w-[400px] rounded" src="{{ asset('storage/'.$event->cover) }}" alt="{{ $event->title }} Img Cover">
        </div>
        <div class="w-full md:w-1/2 flex flex-col justify-between items-center mt-10">
            <div class="text-center">
                <h1 class="text-2xl font-bold mb-4">{{ $event->title }}</h1>
                <p class="text-gray-600">{{ $event->description }}</p>
            </div>
            <div class="md:mb-20 mt-6">
                @if ($event->status == 1)
                <a id="getTickets" data-event-id="{{$event->id}}" class="bg-blue-700 cursor-pointer px-4 py-2 rounded text-white" data-backdrop="false" data-modal-toggle="reservation-modal" data-modal-target="reservation-modal">Reserve</a>
                @else
                <a id="getTickets" data-event-id="{{$event->id}}" class="bg-green-700 cursor-pointer px-4 py-2 rounded text-white" data-backdrop="false" data-modal-toggle="reservation-modal" data-modal-target="reservation-modal">Request</a>
                @endif
                @include('layouts.components.reserve-modal')
            </div>
        </div>
    </div>
</section>

<section class="flex justify-center mb-5">
    <div class="w-3/4">
        <h1 class="text-[26px]">Info</h1>
        <hr class="mb-5">
        <div class="grid">
            <span class="ms-5">Created: {{$event->created_at->diffForHumans()}}</span>
            <span class="ms-5">Location: {{$event->location}}</span>
            <span class="ms-5">Date: {{$event->date}}</span>
            <span class="ms-5">
                Tickets:
                @foreach ($event->tickets as $ticket)
                <span class="ms-2">{{$ticket->ticket_name.' - '.$ticket->ticket_price.'DH / Left: '.$ticket->tickets_left}}</span>
                @endforeach
            </span>
        </div>
    </div>
</section>

@endsection