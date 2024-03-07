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
                <form class="flex flex-col items-center" method="post" action="{{route('events.store')}}" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div style="max-width: 500px;">
                        <div class="mb-2 border border-[#000000] rounded-md">
                            <label for="cover" class="block text-sm flex cursor-pointer w-full justify-between font-medium items-center gap-2 dark:text-white" for="file_input"><span class="p-3.5 text-[#6B7280] ">Upload
                                    Event Cover</span><svg class="me-2" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#686868" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M14 2H6a2 2 0 0 0-2 2v16c0 1.1.9 2 2 2h12a2 2 0 0 0 2-2V8l-6-6z" />
                                    <path d="M14 3v5h5M12 18v-6M9 15h6" />
                                </svg>
                                <input name="cover" required type="file" id="cover" class="block sr-only text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-[#242526] dark:border-gray-600 dark:placeholder-gray-400">
                            </label>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>