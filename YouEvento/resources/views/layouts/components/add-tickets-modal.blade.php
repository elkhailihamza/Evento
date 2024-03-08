<div id="add-tickets-modal" tabindex="-1" aria-hidden="true" data-backdrop="false" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white shadow-md border">
            <div class="flex items-center justify-between p-4 md:p-5 rounded-t">
                <h3 class="text-xl font-semibold text-center text-gray-900">
                    Tickets
                </h3>
            </div>
            <!-- Modal body -->
            <div class="p-4 w-full md:p-5 space-y-4">
                <form class="flex flex-col items-center" method="post" action="{{route('tickets.store', ['event' => $event])}}" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="w-3/4">
                        <div class="mb-2 grid">
                            <label for="ticket_name">Ticket Name</label>
                            <input class="rounded-md" required type="text" name="ticket_name" id="ticket_name" placeholder="Title..">
                        </div>
                        <div class="mb-2 grid">
                            <label for="ticket_qnt">Ticket Price</label>
                            <input class="rounded-md" required type="text" name="ticket_price" id="ticket_qnt" placeholder="Price..">
                        </div>
                        <div class="mb-2 grid">
                            <label for="ticket_qnt">Ticket Quantity</label>
                            <input class="rounded-md" required type="number" min="1" max="999" value="1" name="ticket_qnt" id="ticket_qnt" placeholder="Quantity..">
                        </div>
                    </div>
                    <div class="flex justify-center">
                        <button class="bg-blue-700 rounded text-white p-2.5">Add ticket</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>