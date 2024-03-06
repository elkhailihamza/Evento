<div id="drawer-right-example" data-drawer-backdrop="false" class="fixed md:top-[70px] top-[74px] right-0 z-40 h-screen p-4 overflow-y-auto transition-transform translate-x-full bg-white shadow w-80" tabindex="-1" aria-labelledby="drawer-right-label">
    <h5 id="drawer-right-label" class="inline-flex items-center mb-4 text-base font-semibold text-gray-500 dark:text-gray-400"><svg class="w-4 h-4 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
        </svg>Events</h5>
    <button type="button" data-drawer-backdrop="false" data-drawer-hide="drawer-right-example" aria-controls="drawer-right-example" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 absolute top-2.5 end-2.5 inline-flex items-center justify-center dark:hover:bg-gray-600 dark:hover:text-white">
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
        </svg>
        <span class="sr-only">Close menu</span>
    </button>


    <div class="flex justify-center">
        <button id="getCategories" data-modal-target="default-modal" data-backdrop="false" data-modal-toggle="default-modal" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
            Create Event
        </button>
    </div>

    <hr class="mt-4">

    <div id="default-modal" tabindex="-1" aria-hidden="true" data-backdrop="false" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow border-2">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                    <h3 class="text-xl font-semibold text-gray-900">
                        Create an Event
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="default-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 w-full md:p-5 space-y-4">
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
                            <div class="mb-2 grid">
                                <label for="title">Title</label>
                                <input class="rounded-md" required type="text" name="title" id="title" placeholder="Title..">
                            </div>
                            <div class="mb-2 grid">
                                <label for="description">Description</label>
                                <textarea class="rounded-md ps-2" required style="height: 150px; resize: none;" name="description" id="description" placeholder="Description.." id=""></textarea>
                            </div>
                            <div class="flex gap-3">
                                <div class="mb-2 grid">
                                    <label for="date">Date</label>
                                    <input class="rounded-md" required type="datetime-local" name="date" id="date">
                                </div>
                                <div class="mb-2 grid">
                                    <label for="location">Location</label>
                                    <input class="rounded-md" required type="text" name="location" id="location" placeholder="Location..">
                                </div>
                            </div>
                            <div class="mb-2 grid">
                                <label for="seats">Seats</label>
                                <input class="rounded-md" required type="number" value="10" min="10" max="999" name="seats" id="seats" placeholder="Seats..">
                            </div>
                            <div class="mb-2 grid">
                                <label for="seats">Category</label>
                                <select id="selectCategory" class="rounded-md p-2.5" required name="category_id">
                                    <option value="null" hidden selected disabled>Select Category</option>
                                </select>
                            </div>
                            <div class="flex justify-center">
                                <button type="submit" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Create</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>