<link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
<div class="m-auto w-4/8 py-24">
    <div class="text-center">
        <h1 class="text-5xl uppercase bold"> 
            Create  User
        </h1>
       
    </div>

    <div class="flex justify-center pt-20">
       <form action="/users/store" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="block">
            <input 
            type="text"
            class="block shadow-5xl mb-10 p-2 w-80 italic
            placeholder-gray-400"
            name="name"
            placeholder="Name">

            <input 
            type="text"
            class="block shadow-5xl mb-10 p-2 w-80 italic
            placeholder-gray-400"
            name="email"
            placeholder="Email ..">

            <input 
            type="text"
            class="block shadow-5xl mb-10 p-2 w-80 italic
            placeholder-gray-400"
            name="phone"
            placeholder="Phone ...">
            
            <input 
            type="password"
            class="block shadow-5xl mb-10 p-2 w-80 italic
            placeholder-gray-400"
            name="password"
            placeholder="Password ...">

            <input 
            type="text"
            class="block shadow-5xl mb-10 p-2 w-80 italic
            placeholder-gray-400"
            name="address"
            placeholder="Address ...">

            <input 
            type="text"
            class="block shadow-5xl mb-10 p-2 w-80 italic
            placeholder-gray-400"
            name="role"
            placeholder="Role ...">

            <input 
            type="file"
            class="block shadow-5xl mb-10 p-2 w-80 italic
            placeholder-gray-400"
            name="avatar">

            <button type="submit" class="bg-green-500 block shadow-5xl mb-10 p-2 w-80 uppercase font-bold">
                Submit
            </button>
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