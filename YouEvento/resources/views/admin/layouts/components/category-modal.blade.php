<div id="event-details-{{$category->id ?? 'default'}}" tabindex="-1" aria-hidden="true" data-backdrop="false" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow border-2">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                <h3 class="text-xl text-gray-900">
                    @if (isset($category))
                    Edit Category: "<span class="font-semibold">{{$category->category_name}}</span>".
                    @else
                    Create Category:
                    @endif
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="event-details-{{$category->id ?? 'default'}}">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 w-full md:p-5 flex justify-around space-y-4">
                <div class="flex flex-col gap-5">
                    <div class="text-center">
                        @if (isset($category))
                        <form method="post" action="{{route('admin.categories.update', $category)}}">
                            @csrf
                            @method('POST')
                            <div class="w-[300px] grid mb-3">
                                <label class="font-medium text-[18px] mb-3" for="title">Title</label>
                                <input class="w-full rounded" value="{{$category->category_name ?? ''}}" type="text" name="title" id="title" placeholder="Title..">
                            </div>
                            <div>
                                <button class="px-2 py-1 bg-green-700 text-white">
                                    Update
                                </button>
                            </div>
                        </form>
                        @else
                        <form method="post" action="{{route('admin.categories.create')}}">
                            @csrf
                            @method('POST')
                            <div class="w-[300px] grid mb-3">
                                <label class="font-medium text-[18px] mb-3" for="title">Title</label>
                                <input class="w-full rounded" type="text" name="title" id="title" placeholder="Title..">
                            </div>
                            <div>
                                <button class="px-2 py-1 bg-blue-700 text-white">
                                    Create
                                </button>
                            </div>
                        </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>