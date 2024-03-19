@extends('layouts.app')

@section('content')

<section class="mt-5 mb-10">
    <div class="flex justify-center items-center">
        <h3 class="text-3xl">Events!</h3>
    </div>
</section>

<section class="mt-3">
    <div class="flex flex-wrap-reverse justify-center gap-2">
        <div class="flex sm:w-3/6">
            <input id="searchInput" class="p-2.5 sm:w-full" type="search" placeholder="Seach for an event..">
            <button id="search" class="bg-blue-700 p-2.5 text-white">Search</button>
        </div>
        <div class="px-2">
            <select id="sortBy" class="sm:w-full w-fit p-2.5 cursor-pointer">
                <option value="1" hidden disabled selected>Sort By</option>
                <option value="1">Title</option>
                <option value="2">Category</option>
            </select>
        </div>
    </div>
</section>

<section id="searchSection" class="mt-4 flex flex-wrap flex-col items-center gap-3 mt-20">
    <h1 class="font-semibold text-[28px] text-gray-800">Search For An Event!</h1>
</section>

<section class="flex justify-center mt-10 mb-10">
    <div class="flex justify-end">
        {{ $events->links() }}
    </div>
</section>

@endsection