@extends('admin.layouts.app')

@section('content')

<section class="flex justify-center p-2.5 mt-5 mb-10">
    <div class="w-1/2">
        <h3 class="text-3xl">Events:</h3>
    </div>
</section>

<section class="flex flex-col gap-3 justify-center items-center">
    <div class="flex w-4/5 justify-end">
        <button class="px-2 py-1 text-white bg-blue-700" data-modal-toggle="event-details-default" data-modal-target="event-details-default">Create</button>
        @include('admin.layouts.components.category-modal')
    </div>
    <div class="relative overflow-x-auto w-4/5">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Title
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Events
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Created
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Updated
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Controls
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                <tr class="bg-white text-black border">
                    <td class="px-6 py-3 border truncate">
                        {{$category->category_name}}
                    </td>
                    <td class="px-6 py-3 border">
                        {{$category->events->count()}}
                    </td>
                    <td class="px-6 py-3 border truncate">
                        {{$category->created_at->diffForHumans()}}
                    </td>
                    <td class="px-6 py-3 border truncate">
                        {{$category->updated_at->diffForHumans()}}
                    </td>
                    <td class="px-6 py-3 flex">
                        <form method="post" action="{{route('admin.categories.destroy', $category)}}">
                            @csrf
                            @method('POST')
                            <button type="submit" class="px-1 py-1 mr-2 bg-red-700 rounded text-white"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M21 4H8l-7 8 7 8h13a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2z"></path>
                                    <line x1="18" y1="9" x2="12" y2="15"></line>
                                    <line x1="12" y1="9" x2="18" y2="15"></line>
                                </svg></button>
                        </form>
                        <button class="px-1 py-1 bg-green-700 rounded text-white" data-backdrop="false" data-modal-toggle="event-details-{{$category->id}}" data-modal-target="event-details-{{$category->id}}"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                <polygon points="16 3 21 8 8 21 3 21 3 16 16 3"></polygon>
                            </svg></button>
                        @include('admin.layouts.components.category-modal')
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>

@endsection