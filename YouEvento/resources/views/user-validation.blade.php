@extends('layouts.app')

@section('content')

<section class="flex justify-center p-2.5 mt-5 mb-10">
    <div class="w-4/5">
        <h3 class="text-3xl">User Validation: <span class="font-medium">{{$event->title}}</span></h3>
    </div>
</section>
<section class="flex flex-col gap-3 justify-center items-center">
    <div class="relative overflow-x-auto w-4/5">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Ticket
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Controls
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($event->tickets as $ticket)
                @foreach ($ticket->reservations as $reservation)
                <tr class="bg-white text-black border">
                    <td class="px-6 py-3 border truncate">
                        {{$reservation->user->name}}
                    </td>
                    <td class="px-6 py-3 border">
                        {{$ticket->ticket_name}}
                    </td>
                    <td class="px-6 py-3 border">
                        {{$reservation->status ? 'Accepted' : 'Awating..'}}
                    </td>
                    @if (!$reservation->status)
                    <td class="px-6 py-3 flex justify-center">
                        <form method="post" action="{{route('user.validation.decline', [$event, $reservation->user])}}">
                            @csrf
                            @method('POST')
                            <button type="submit" class="px-1 py-1 mr-2 bg-red-700 rounded text-white"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M21 4H8l-7 8 7 8h13a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2z"></path>
                                    <line x1="18" y1="9" x2="12" y2="15"></line>
                                    <line x1="12" y1="9" x2="18" y2="15"></line>
                                </svg></button>
                        </form>
                        <form method="post" action="{{route('user.validation.accept', [$event, $reservation->user])}}">
                            @csrf
                            @method('POST')
                            <button type="submit" class="px-1 py-1 mr-2 bg-green-700 rounded text-white"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="20 6 9 17 4 12"></polyline>
                                </svg></button>
                        </form>
                    </td>
                    @endif
                </tr>
                @endforeach
                @endforeach
            </tbody>
        </table>
    </div>
</section>

@endsection