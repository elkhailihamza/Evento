@extends('admin.layouts.app')

@section('content')

<section class="flex justify-center items-center mb-20">
    <div class="w-4/5 mt-10">
        <h3 class="text-3xl">Permissions:</h3>
    </div>
</section>

<section>
    <section class="flex justify-center align-center">
        <div class="relative overflow-x-auto w-4/5">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Email
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Role
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Created_at
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Updated_at
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Controls
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr class="bg-white text-black border">
                        <td class="px-6 py-3 border truncate">
                            {{$user->name}}
                        </td>
                        <td class="px-6 py-3 border">
                            {{$user->email}}
                        </td>
                        <td class="px-6 py-3 border">
                            {{$user->role->role_name}}
                        </td>
                        <td class="px-6 py-3 border">
                            {{$user->created_at->diffForHumans()}}
                        </td>
                        <td class="px-6 py-3 border">
                            {{$user->updated_at->diffForHumans()}}
                        </td>
                        <td class="px-6 py-3 flex justify-center">
                            <form method="post" action="{{route('admin.permissions.ban', $user)}}">
                                @csrf
                                @method('POST')
                                <button type="submit" class="px-1 py-1 mr-2 bg-yellow-700 rounded text-white"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M21 4H8l-7 8 7 8h13a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2z"></path>
                                        <line x1="18" y1="9" x2="12" y2="15"></line>
                                        <line x1="12" y1="9" x2="18" y2="15"></line>
                                    </svg></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
    <div>{{$users->links()}}</div>
</section>

@endsection