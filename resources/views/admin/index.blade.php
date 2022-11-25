<link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot> --}}

<div class="m-auto w-4/5 py-14">
    <div class="text-center">
        <span class="uppercase text-blue-500 font-bold text-5xl italic"> 
            Users
        </span>
    </div>
    <div class="flex space-x-2 justify-center">
       @if (Auth::user())
            <a href="/dashboard"
            class="px-6 py-3 text-blue-100 no-underline bg-blue-500 rounded hover:bg-blue-600  hover:text-blue-200">Dashboard </a>
            <div class="pt-4">
                <a href="users/create"
                class="border-b-2 pb-2 border-dotted italic text-gray-500">
                    Add a new user &rarr;
                </a>
            </div>
            <div class="pt-4">
                <a href="users/trashed"
                class="px-6 py-3 text-blue-100 no-underline bg-red-500 rounded hover:bg-red-600  hover:text-red-200">
                    Trashed Users
                </a>
            </div>
    </div>
 
    @else
    <p class="py-12 italic">
        Please login in to add a new user.
    </p>
   @endif
    <div class="flex flex-col">
    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
      <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
        <div class="overflow-hidden">
          <table class="min-w-full">
            <thead class="border-b">
              <tr>
                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                  Id
                </th>
                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                  Name
                </th>
                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                  Role
                </th>
                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                  Action
                </th>
              </tr>
            </thead>
            <tbody>
             @foreach ($users as $user)
              <tr class="border-b">
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $user->id}}</td>
                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                    {{ $user->name}}
                </td>
                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                    {{ $user->role}}
                </td>
                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                    @if(isset(Auth::user()->id))
                      <a 
                       class="border-b-2 pb-2 border-dotted italic text-blue-500"
                       href="/users/{{ $user->id}}/show">
                        Show &rarr;
                        </a>
                        <a 
                        class="border-b-2 pb-2 border-dotted italic text-green-500"
                        href="users/{{ $user->id}}/edit">
                            Edit &rarr;
                        </a>
                        @if ($user->id== 1)
                        <a
                        class="border-b-2 pb-2 border-dotted italic text-red-500">
                           {{-- Disabled Delete --}}
                        </a> 
                        {{-- <button type="button" 
                        class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md focus:outline-none focus:ring-0 transition duration-150 ease-in-out pointer-events-none opacity-60" 
                        disabled>Primary</button> --}}
                        @else
                          <form action="users/{{$user->id}}/delete" class="pt-3" method="POST">
                            @csrf
                            @method('delete')
                            <button 
                            type="submit"
                            class="border-b-2 pb-2 border-dotted italic text-red-500">
                            Delete &rarr;
                            </button>
                          </form>
                        @endif
                    @endif
                </td>
              </tr>
            @endforeach
            </tbody>
          </table>
        </div>
        
      </div>
      {{ $users->links() }}
    </div>

  </div>
{{-- </x-app-layout> --}}