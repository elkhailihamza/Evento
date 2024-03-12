@extends('layouts.app')

@section('content')

<section class="flex flex-col items-center">
    <div class="mt-20">
        <h1 class="text-[30px] font-medium">Latest Events:</h1>
    </div>
    <div class="flex flex-col items-center">
        @if (isset($events) && $events->isNotEmpty())
        @foreach ($events as $event)
        <div class="w-[300px] rounded-md border p-2">
            <a href="{{route('viewEvent', $event)}}">
                <div class="flex bg-gray-100 justify-center mb-3">
                    <img src="{{ asset('storage/'.$event->cover) }}">
                </div>
                <div>
                    <h2 class="truncate">Title: {{$event->title}}</h2>
                    <p class="truncate">Created: {{$event->created_at->diffForHumans()}}</p>
                </div>
            </a>
        </div>
        @endforeach
        @else
        <div class="text-center mt-20">
            <h1 class="text-[20px]">No Current Events Can Be Found At The Moment!</h1>
        </div>
        @endif
    </div>
</section>

<section class="flex justify-center mt-10 mb-10">
    <div class="flex justify-end">
        {{ $events->links() }}
    </div>
</section>

@endsection