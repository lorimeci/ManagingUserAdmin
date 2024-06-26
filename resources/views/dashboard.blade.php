<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">

            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    {{-- ktu duhet gjithashtu me kontrollu nqs roli == null kur userat krijohen 
        nga registation form ato nuk kan nje rol ne db , po useri kur registrohet nga forma roli = admin?? --}}
    @if (Auth::user() ->role == 'Guest')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div>{{ Auth::user()->name }} You're logged in!</div>  
                </div>
            </div>
        </div>
    </div>
    @elseif (Auth::user() ->role == 'Admin')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div>{{ Auth::user()->name }} You're logged in!</div>  
                </div>
            </div>
        </div>
    </div>
    @endif
</x-app-layout>
