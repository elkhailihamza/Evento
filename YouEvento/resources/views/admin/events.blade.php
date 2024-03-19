@extends('admin.layouts.app')

@section('content')

<section class="flex justify-center p-2.5 mb-20">
    <div class="w-4/5 mt-10">
        <h3 class="text-3xl">Events:</h3>
    </div>
</section>

<section class="flex justify-center align-center">
    <div class="relative overflow-x-auto w-4/5">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Title
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Category
                    </th>
                    <th scope="col" class="px-6 py-3">
                        User
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Controls
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($events as $event)
                <tr class="bg-white text-black border">
                    <td class="px-6 py-3 border truncate">
                        {{$event->title}}
                    </td>
                    <td class="px-6 py-3 border">
                        {{$event->category->category_name}}
                    </td>
                    <td class="px-6 py-3 border">
                        {{$event->user->name}}
                    </td>
                    <td class="px-6 py-3 flex justify-center">
                        <form method="post" action="{{route('admin.decline', $event)}}">
                            @csrf
                            @method('POST')
                            <button type="submit" class="px-1 py-1 mr-2 bg-red-700 rounded text-white"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M21 4H8l-7 8 7 8h13a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2z"></path>
                                    <line x1="18" y1="9" x2="12" y2="15"></line>
                                    <line x1="12" y1="9" x2="18" y2="15"></line>
                                </svg></button>
                        </form>
                        <form method="post" action="{{route('admin.approve', $event)}}">
                            @csrf
                            @method('POST')
                            <button type="submit" class="px-1 py-1 mr-2 bg-green-700 rounded text-white"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                    <line x1="12" y1="5" x2="12" y2="19"></line>
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                </svg></button>
                        </form>
                        <button class="px-1 py-1 bg-blue-700 rounded text-white" data-backdrop="false" data-modal-toggle="event-details-{{$event->id}}" data-modal-target="event-details-{{$event->id}}"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10"></circle>
                                <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"></path>
                                <line x1="12" y1="17" x2="12.01" y2="17"></line>
                            </svg></button>
                        @include('admin.layouts.components.event-details')
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>

@endsection