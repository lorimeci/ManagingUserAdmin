{{-- @include('layouts.navigation') --}}
<link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
<div class="m-auto w-4/5 py-14">
    <div class="text-center">
        <span class="uppercase text-blue-500 font-bold text-5xl italic"> 
            Users
        </span>
    </div>
    @if (Auth::user())
    <a href="/dashboard"
    class="px-6 py-3 text-blue-100 no-underline bg-blue-500 rounded hover:bg-blue-600 hover:underline hover:text-blue-200">Back</a>
    <div class="pt-4">
        <a href="users/create"
        class="border-b-2 pb-2 border-dotted italic text-gray-500">
            Add a new user &rarr;
        </a>
    </div>
    <div class="pt-4">
        <a href="users/trashed"
        class="border-b-2 pb-2 border-dotted italic text-gray-500">
            Trashed Users &rarr;
        </a>
    </div>
    @else
    <p class="py-12 italic">
        Please login in to add a new user.
    </p>
@endif
<div class="w-5/6 py-10">
    @foreach ($users as $user)
    <div class="m-auto">
        @if (isset(Auth::user()->id))
        <div class="float-right">
            <a 
            class="border-b-2 pb-2 border-dotted italic text-green-500"
            href="users/{{ $user->id}}/edit">
                Edit &rarr;
            </a>
            @if ( $user->role == 'Admin')
            <a
            class="border-b-2 pb-2 border-dotted italic text-red-500">
               Disabled Delete
            </a> 
            @else
            <form action="users/{{$user->id}}" class="pt-3" method="POST">
                @csrf
                @method('delete')
                <button 
                type="submit"
                class="border-b-2 pb-2 border-dotted italic text-red-500">
                Delete &rarr;
                </button>
            </form>
            @endif

        </div>
        @endif
      
        <h2 class="text-gray-700 text-5xl hover:text-orange-500">
            <a href="/users/{{ $user->id}}/show">
                {{ $user->name}}
            </a>
           
        </h2>
        <span class="uppercase text-blue-500 font-bold text-xs italic"> 
            Role : {{ $user->role}}
        </span>
        <hr class="mt-4 mb-8">
     </div>
        @endforeach
    </div>
    {{ $users->links() }}
</div>
