<div id="reservation-modal" tabindex="-1" aria-hidden="true" data-backdrop="false" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white shadow-md border">
            <div class="flex items-center justify-between p-4 md:p-5 rounded-t">
                <h3 class="text-xl font-semibold text-center text-gray-900">
                    Reservation
                </h3>
            </div>
            <!-- Modal body -->
            <div class="p-4 w-full md:p-5 space-y-4 mt-3">
                <div id="ticketSection">

                </div>
                <form class="flex flex-col items-center" method="post" action="{{route('reservation.store', ['event' => $event])}}" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="w-3/4">
                        <label for="seats">Tickets</label>
                        <div class="mb-2 border border-[#000000] rounded-md">
                            <select id="selectTickets" name="ticket" class="w-full rounded-md p-2.5" required>
                                <option value="null" hidden selected disabled>Select Ticket</option>
                                @foreach ($event->tickets as $ticket)
                                <option value="{{$ticket->id}}">{{$ticket->ticket_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex justify-center">
                            @if ($ticket->tickets_left > 0)
                            @if ($event->automated == 1)
                            <button id="reserve" type="submit" class="p-2.5 hidden bg-blue-700 text-white rounded">Reserve</button>
                            @else
                            <button id="reserve" type="submit" class="p-2.5 hidden bg-green-700 text-white rounded">Request</button>
                            @endif
                            @else
                            <h1>Sold Out!</h1>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>