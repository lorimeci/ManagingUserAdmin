<link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
<div class="m-auto w-4/8 py-10">
    <div class="text-center">
        <h1 class="text-5xl uppercase bold"> 
            Update User
        </h1>
       
    </div>
    
    <div class="flex justify-center pt-20">
       <form action="/users/{{ $users->id }}/update" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="block">
            {{-- @if(isset(Auth::user()->id)) --}}
            <input 
            type="text"
            class="block shadow-5xl mb-10 p-2 w-80 italic
            placeholder-gray-400"
            name = "name"
            value = "{{$users->name}}">

            <input 
            type="text"
            class="block shadow-5xl mb-10 p-2 w-80 italic
            placeholder-gray-400"
            name="email"
            value = "{{$users->email}}">

            <input 
            type = "text"
            class = "block shadow-5xl mb-10 p-2 w-80 italic
            placeholder-gray-400"
            name = "phone"
            value = "{{$users->phone}}">

            <input 
            type = "text"
            class = "block shadow-5xl mb-10 p-2 w-80 italic
            placeholder-gray-400"
            name = "address"
            value = "{{$users->address}}">

            <input 
            type="file"
            class="block shadow-5xl mb-10 p-2 w-80 italic
            placeholder-gray-400"
            name="avatar"
            value = "{{asset('images/' .$users->avatar)}}">

            <button type ="submit" class="bg-green-500 block shadow-5xl mb-10 p-2 w-80 uppercase font-bold">
                Submit
            </button>
            {{-- @endif --}}
        </div>   
       </form>
    </div>
    @if ($errors->any()){
        <div class="w-4/8 m-auto text-center">
            @foreach ($errors->all() as $error)
                <li class=" text-red-500 list-none"> 
                    {{$error}}
                </li>
            @endforeach
        </div>
       }
       @endif

</div>