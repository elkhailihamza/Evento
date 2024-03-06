@extends('layouts.app')

@section('content')

<section>
    <div class="flex justify-center items-center">
        <h3 class="text-3xl">Events!</h3>
    </div>
</section>

<section class="mt-3">
    <div class="flex flex-wrap-reverse justify-center gap-2">
        <div class="grid sm:w-3/6 gap-2">
            <input class="p-2.5 sm:w-full rounded" type="search" placeholder="Seach for an event..">
            <div class="flex justify-end">
                <button class="bg-blue-700 p-2.5 rounded text-white">Search</button>
            </div>
        </div>
        <div class="px-2">
            <select class="rounded sm:w-full w-fit text-center p-2.5" id="sortBy">
                <option value="1" hidden disabled selected>Sort By</option>
                <option value="1">Title</option>
                <option value="2">Category</option>
            </select>
        </div>
    </div>
</section>

<section class="mt-4 flex flex-wrap justify-center gap-3">
    @foreach ($events as $event)
    <div class="w-[300px] rounded-md border p-2">
        <div class="flex justify-center mb-3">
            @if (file_exists(storage_path().'/'.$event->cover))
            <img src="{{ asset('storage/'.$event->cover) }}">
            @else
            <img src="{{ asset('storage/images/thumbnail.png') }}" />
            @endif
        </div>
        <div>
            <h2 class="truncate">Title: {{$event->title}}</h2>
            <p class="truncate">Created: {{$event->created_at->diffForHumans()}}</p>
        </div>
    </div>
    @endforeach
</section>

@endsection