@extends('layouts.app')

@section('content')

<section>
    <div class="flex justify-center items-center">
        <h3 class="text-3xl">Events!</h3>
    </div>
</section>

<section>
    <div>
        @if ($events->isNotEmpty())
            {{dd($events)}}
        @endif
    </div>
</section>

@endsection