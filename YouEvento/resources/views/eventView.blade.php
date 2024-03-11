@extends('layouts.app')

@section('content')

<section class="flex justify-center">
    <div class="flex w-4/5 justify-between items-center">
        <a href="{{route('events')}}" class="text-[16px] w-20 opacity-50 hover:underline flex items-center"><svg class="mt-1" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                <path d="M19 12H6M12 5l-7 7 7 7" />
            </svg><span>Go back</span></a>
        <div class="flex gap-2">
            @if ($event->status == 2)
                <span></span>
            @endif
            <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" type="button"><svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0" />
                </svg>
            </button>
        </div>

        @if ($event->user_id == auth()->user()->id)
        <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44">
            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                <li>
                    <a href="{{route('events.statistics', $event)}}" class="block px-4 py-2 hover:bg-gray-100 text-black">View Statistics</a>
                </li>
                @if (!$event->automated)
                <li>
                    <a href="{{route('user.validation', $event)}}" class="block px-4 py-2 hover:bg-gray-100 text-black">User Validation</a>
                </li>
                @endif
            </ul>
        </div>
        @endif

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
                @if ($event->tickets->count() > 0 && $event->status)
                @if ($event->automated == 1)
                <a id="getTickets" data-event-id="{{$event->id}}" class="bg-blue-700 cursor-pointer px-4 py-2 rounded text-white" data-backdrop="false" data-modal-toggle="reservation-modal" data-modal-target="reservation-modal">Reserve</a>
                @else
                <a id="getTickets" data-event-id="{{$event->id}}" class="bg-green-700 cursor-pointer px-4 py-2 rounded text-white" data-backdrop="false" data-modal-toggle="reservation-modal" data-modal-target="reservation-modal">Request</a>
                @endif
                @endif
                @if ($event->user_id == auth()->user()->id)
                <a class="bg-yellow-700 cursor-pointer px-4 py-2 rounded text-white" data-backdrop="false" data-modal-toggle="add-tickets-modal" data-modal-target="add-tickets-modal">Add Tickets</a>
                <a id="modalEdit" data-event-id="{{$event->id}}" class="bg-black cursor-pointer px-4 py-2 rounded text-white" data-backdrop="false" data-modal-toggle="edit-modal" data-modal-target="edit-modal">Edit</a>
                @include('layouts.components.reserve-modal')
                @include('layouts.components.add-tickets-modal')
                @include('layouts.components.edit-modal')
                @endif
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