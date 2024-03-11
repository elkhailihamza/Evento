@if (isset($events))
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
@endif

@if(isset($categories))
<div class="flex flex-col gap-3">
    @foreach ($categories as $category)
    <div class="mb-2">
        <h1 class="font-medium text-[26px]">{{$category->category_name}}</h1>
    </div>
    <div class="flex gap-2">
        @if ($category)
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
            <h1>No Events!</h1>
        </div>
        @endif
    </div>
    @endforeach
</div>
@endif