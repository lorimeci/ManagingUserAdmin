<link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
<div class="flex justify-center pt-2 ">
    <form action="/users/store" method="POST" enctype="multipart/form-data">
        @csrf
            <div class="block">
                 <input 
                type="text"
                class="block shadow-5xl mb-4 w-80 italic
                placeholder-gray-400"
                name="name"
                placeholder="Name">
                    @error('name')
                        <li class=" text-red-500 mb-4 list-none"> 
                            {{$message}}
                        </li>
                    @enderror
                <input 
                type="text"
                class="block shadow-5xl mb-4  w-80 italic 
                placeholder-gray-400"
                name="email"
                placeholder="Email ..">
                        @error('email')
                        <li class=" text-red-500 mb-4 list-none"> 
                            {{$message}}
                        </li>
                        @enderror
                <input 
                type="text"
                class="block shadow-5xl mb-4  w-80 italic
                placeholder-gray-400"
                name="phone"
                placeholder="Phone ...">
                        @error('phone')
                        <li class=" text-red-500 mb-4 list-none"> 
                            {{$message}}
                        </li>
                        @enderror
                <input 
                type="password"
                class="block shadow-5xl mb-4  w-80 italic
                placeholder-gray-400"
                name="password"
                placeholder="Password ...">
                        @error('password')
                        <li class=" text-red-500  mb-4 list-none"> 
                            {{$message}}
                        </li>
                        @enderror
                <input 
                type="text"
                class="block shadow-5xl mb-4  w-80 italic
                placeholder-gray-400"
                name="address"
                placeholder="Address ...">
                        @error('address')
                        <li class=" text-red-500  mb-4 list-none"> 
                            {{$message}}
                        </li>
                        @enderror
                <input 
                type="text"
                class="block shadow-5xl mb-4 w-80 italic
                placeholder-gray-400"
                name="role"
                placeholder="Role ...">
                        @error('role')
                        <li class=" text-red-500 mb-4 list-none"> 
                            {{$message}}
                        </li>
                        @enderror
                <input 
                type="file"
                class="block shadow-5xl mb-4  w-80 italic
                placeholder-gray-400"
                name="avatar">
                    @error('avatar')
                    <li class=" text-red-500  mb-4 list-none"> 
                        {{$message}}
                    </li>
                    @enderror

                <button type="submit" class="bg-green-500 block shadow-5xl mb-10 p-2 w-80 uppercase font-bold">
                    Submit
                </button>
            </div>
    </form>
</div>
    {{-- @if ($errors->any())
        <div class="w-4/8 m-auto text-center">
            @foreach ($errors->all() as $error)
                <li class=" text-red-500 list-none"> 
                    {{$error}}
                </li>
            @endforeach
        </div>
    
    @endif --}}