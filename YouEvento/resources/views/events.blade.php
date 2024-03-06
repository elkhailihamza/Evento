@extends('layouts.app')

@section('content')

<section>
    <div class="flex justify-center items-center">
        <h3 class="text-3xl">Events!</h3>
    </div>
</section>

<section class="mt-3">
    <div class="flex flex-wrap justify-center gap-2">
        <div class="grid w-1/2 gap-2">
            <input class="p-2.5 rounded" type="search" placeholder="Seach for an event..">
            <div class="flex justify-end">
                <button class="bg-blue-700 p-2.5 rounded text-white">Search</button>
            </div>
        </div>
        <div class="px-2">
            <select class="rounded text-center p-2.5" id="sortBy">
                <option value="1" hidden disabled selected>Sort By</option>
                <option value="1">Title</option>
                <option value="2">Category</option>
            </select>
        </div>
    </div>
</section>

@endsection