<nav class="bg-white border-2 shadow-sm border-gray-200">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a class="flex items-center justify-center text-2xl font-semibold text-gray-900">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="#008CFF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="12" r="2"></circle>
                <path d="M16.24 7.76a6 6 0 0 1 0 8.49m-8.48-.01a6 6 0 0 1 0-8.49m11.31-2.82a10 10 0 0 1 0 14.14m-14.14 0a10 10 0 0 1 0-14.14"></path>
            </svg>
            <span class="ml-2">YouEvento</span>
        </a>
        <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
            <form method="post" class="flex items-center" action="{{route('logout')}}">
                <button type="submit" class="text-white bg-red-500 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm p-2 text-center">
                    @csrf
                    @method('POST')
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M16 17l5-5-5-5M19.8 12H9M10 3H4v18h6" />
                    </svg>
                </button>
            </form>
            <button data-drawer-target="cta-button-sidebar" data-drawer-backdrop="false" data-drawer-toggle="cta-button-sidebar" aria-controls="cta-button-sidebar" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200">
                <span class="sr-only">Open sidebar</span>
                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
                </svg>
            </button>
        </div>
        @include('layouts.components.phone_drawer')
        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-cta">
            <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white">
                @php
                $isActive = request()->routeIs('index');
                @endphp
                <li>
                    <a href="{{ route('index') }}" class="text-gray-700 bg-transparent py-2 px-3 md:p-0 text-white rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-black-700 {{ request()->routeIs('index') ? 'bg-blue-700 md:text-blue-700' : 'bg-transparent md:text-black md:hover:text-blue-700'}}">Home</a>
                </li>
                <li>
                    <a href="{{ route('events') }}" class="text-gray-700 bg-transparent py-2 px-3 md:p-0 text-white rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-black-700 {{ request()->routeIs('events') ? 'bg-blue-700 md:text-blue-700' : 'bg-transparent md:text-black md:hover:text-blue-700'}}">Events</a>
                </li>
                <li>
                    <a href="{{ route('reservations') }}" class="text-gray-700 bg-transparent py-2 px-3 md:p-0 text-white rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-black-700 {{ request()->routeIs('reservations') ? 'bg-blue-700 md:text-blue-700' : 'bg-transparent md:text-black md:hover:text-blue-700'}}">Reservations</a>
                </li>
            </ul>
        </div>
    </div>
</nav>