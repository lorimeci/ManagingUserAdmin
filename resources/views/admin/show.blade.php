<link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __(' Show User') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-4">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="">
                    <a href="{{ route('users') }}" class="px-6 py-3 text-blue-100 no-underline bg-blue-500 rounded hover:bg-blue-600  hover:text-blue-200">
                        View All Users
                    </a>
                </div>
            </div>
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="">
                    <div class="mb-4" >
                        <img 
                        src="{{ asset('images/' . $users->avatar)}}" 
                        class="rounded-full w-32 mb-4 mx-auto"
                        alt="Avatar">
                        </div>
                        <h1 class="text-5xl uppercase bold text-center"> 
                            {{$users->name}}
                        </h1>
                        <div class="py-10 text-center">
    
                            <div class="m-auto">
                               
                                <p class="text-lg text-gray-700 py-6">
                                    Email  : {{ $users->email}}
                                </p>
                              
                                <p class="text-lg text-gray-700 py-6">
                                    Address:   {{ $users->address}}
                                </p>
                    
                                <p class="text-lg text-gray-700 py-6">
                                  Created At:  {{ $users->created_at}}
                                </p>
                                
                                <hr class="mt-4 mb-8">
                            </div>
                         
                        </div>
                </div>
            </div>
        </div>
       
    </div>
</x-app-layout>