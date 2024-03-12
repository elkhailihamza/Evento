@if(session('success'))
    <div class="bg-green-600 text-white w-full rounded p-2" id="alert">
        @if(is_array(session('success')))
            @foreach (session('success') as $success)
                @foreach ($success as $success)
                    <span>{{ $success }}</span>
                    <br>
                @endforeach
            @endforeach
        @else
            {{ session('success') }}
        @endif
    </div>
@endif

@if(session('error'))
    <div class="bg-red-600 text-white w-full rounded p-2" id="alert">
        @if(is_array(session('error')))
            @foreach (session('error') as $error)
                @foreach ($error as $err)
                    <span>{{ $err }}</span>
                    <br>
                @endforeach
            @endforeach
        @else
            <span>{{ session('error') }}</span>
        @endif
    </div>
@endif
