@foreach ($events as $event)
<div class="w-full rounded-md border p-2 mb-4">
    <a href="{{route('viewEvent', $event)}}">
        <div class="flex justify-center mb-3">
            <img src="{{ asset('storage/'.$event->cover) }}">
        </div>
        <div>
            <h2 class="truncate">Title: {{$event->title}}</h2>
            <p class="truncate">Created: {{$event->created_at->diffForHumans()}}</p>
        </div>
    </a>
</div>
<hr>
@endforeach