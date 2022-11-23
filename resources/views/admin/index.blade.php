<link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">

<div class="m-auto w-4/5 py-14">
    <div class="text-center">
        <span class="uppercase text-blue-500 font-bold text-5xl italic"> 
            Users
        </span>
    </div>
    @if (Auth::user())
    <div class="pt-4">
        <a href="users/create"
        class="border-b-2 pb-2 border-dotted italic text-gray-500">
            Add a new user &rarr;
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
             <form action="users/{{$user->id}}" class="pt-3" method="POST">
                @csrf
                @method('delete')
                <button 
                type="submit"
                class="border-b-2 pb-2 border-dotted italic text-red-500">
                Delete &rarr;
                </button>
            </form>
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
