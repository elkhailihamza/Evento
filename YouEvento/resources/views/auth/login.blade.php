@extends('auth.layouts.app')

@section('content')
<section>
    <form method="post" action="{{route('login.send')}}">
        @csrf
        @method('POST')
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <a class="flex gap-2 items-center mb-6 text-3xl font-semibold text-gray-900">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="#008CFF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="2"></circle>
                    <path d="M16.24 7.76a6 6 0 0 1 0 8.49m-8.48-.01a6 6 0 0 1 0-8.49m11.31-2.82a10 10 0 0 1 0 14.14m-14.14 0a10 10 0 0 1 0-14.14"></path>
                </svg><span>YouEvento</span>
            </a>
            <div class="w-full bg-white rounded-lg md:mt-0 sm:max-w-md xl:p-0">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl text-dark font-bold leading-tight tracking-tight text-gray-900 md:text-2xl">
                        Sign in to your account
                    </h1>
                    <form class="space-y-4 md:space-y-6" action="#">
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                            <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Email" required="">
                        </div>
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
                            <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" required="">
                        </div>
                        <div class="flex justify-end items-center justify-between">
                            <a href="#" class="text-sm font-medium text-blue-600 hover:underline">Forgot password?</a>
                        </div>
                        <div class="flex justify-center">
                            <button type="submit" class="w-full text-white w-[100px] bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 bg-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Sign in</button>
                        </div>
                        <p class="text-sm font-light text-gray-500 dark:text-gray-700">
                            Don’t have an account yet? <a href="{{route('register')}}" class="font-medium text-primary-600 hover:underline text-blue-500">Sign up</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </form>
</section>
@endsection