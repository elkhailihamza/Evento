<div id="event-details-{{$event->id}}" tabindex="-1" aria-hidden="true" data-backdrop="false" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow border-2">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                <h3 class="text-xl text-gray-900">
                    Event: "<span class="font-semibold">{{$event->title}}</span>" Details
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="event-details-{{$event->id}}">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 w-full md:p-5 flex justify-around space-y-4">
                <div class="flex flex-col justify-center">
                    <img src="{{asset('storage/'.$event->cover)}}" alt="{{$event->title}} Img Cover">
                </div>
                <div class="flex flex-col gap-5">
                    <div class="text-center">
                        <h2 class="font-medium text-[26px]">Details:</h2>
                    </div>
                    <div class="flex flex-col truncate">
                        <span><span class="font-medium">Title:</span> {{$event->title}}</span>
                        <span><span class="font-medium">Description:</span> {{$event->description}}</span>
                        <span><span class="font-medium">Created:</span> {{$event->created_at}}</span>
                        <span><span class="font-medium">Updated:</span> {{$event->updated_at}}</span>
                        <span><span class="font-medium">Location:</span> {{$event->location}}</span>
                        <span><span class="font-medium">Date:</span> {{$event->date}}</span>
                        <span><span class="font-medium">Tickets:</span> {{$event->tickets->count()}}
                            <span> 
                                @foreach ($event->tickets as $ticket)
                                <span>| {{$ticket->ticket_name}}</span>
                                <span>/ {{$ticket->ticket_qnt}}</span>
                                <span>/ {{$ticket->ticket_price}} DH </span>
                                @endforeach
                                |
                            </span>
                        </span>
                        <span><span class="font-medium">Validation:</span> {{$event->automated ? 'Auto' : 'Manual'}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>