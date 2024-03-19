@if (isset($events))
<section class="flex justify-end">
    <h1>Search Results: {{$events->count()}}</h1>
</section>
@if ($events->isNotEmpty())
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
<div>
    <h1 class="text-gray-600 font-semibold text-[30px]">No Events Can Be Found!</h1>
</div>
@endif
@endif

@if(isset($categories))
<section class="flex justify-end">
    <h1>Search Results: {{$categories->count()}}</h1>
</section>
<div class="flex flex-col gap-3">
    @php
    $searchCount = $categories->count();
    @endphp
    @foreach ($categories as $category)
    <div class="mb-2">
        <h1 class="font-medium text-[26px] text-gray-600">{{$category->category_name}}</h1>
    </div>
    <div class="flex gap-2">
        @if ($category)
        @if (isset($events) && $events->isNotEmpty())
        @foreach ($category->events as $event)
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
        <div>
            <div>
                <h1 class="text-gray-600 font-semibold text-[20px]">No Events Can Be Found!</h1>
            </div>
        </div>
        @endif
        @else
        <div>
            <h1>No Events!</h1>
        </div>
        @endif
    </div>
    @endforeach
</div>
@endif