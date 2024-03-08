@extends('layouts.app')

@section('content')

<section class="mt-20 mb-10">
    <div class="flex justify-center items-center">
        <h3 class="text-3xl">Events!</h3>
    </div>
</section>

<section class="mt-3">
    <div class="flex flex-wrap-reverse justify-center gap-2">
        <div class="grid sm:w-3/6 gap-2">
            <input id="searchInput" class="p-2.5 sm:w-full rounded" type="search" placeholder="Seach for an event..">
            <div class="flex justify-end">
                <button id="search" class="bg-blue-700 p-2.5 rounded text-white">Search</button>
            </div>
        </div>
        <div class="px-2">
            <select id="sortBy" class="rounded sm:w-full w-fit text-center p-2.5">
                <option value="1" hidden disabled selected>Sort By</option>
                <option value="1">Title</option>
                <option value="2">Category</option>
            </select>
        </div>
    </div>
</section>

<section id="searchSection" class="mt-4 flex flex-wrap justify-center gap-3">
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
</section>

<section class="flex justify-center mt-10 mb-10">
    <div class="flex justify-end">
        {{ $events->links() }}
    </div>
</section>

@endsection