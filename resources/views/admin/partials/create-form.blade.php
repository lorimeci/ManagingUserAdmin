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
                placeholder="Name"
                value="{{old('name')}}">
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
                placeholder="Email .."
                value="{{old('email')}}">
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
                placeholder="Phone ..."
                value="{{old('phone')}}">
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
                placeholder="Password ..."
                >
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
                placeholder="Address ..."
                value="{{old('address')}}">
                        @error('address')
                        <li class=" text-red-500  mb-4 list-none"> 
                            {{$message}}
                        </li>
                        @enderror
                <select class="form-control mb-4"  
                name="role" 
                placeholder="Select Role" >
                    <option value="" disabled selected> Select Role </option>     
                    <option value="Admin">Admin</option>
                    <option value="Guest">Guest</option>
                </select>
                @error('role')
                <li class=" text-red-500  mb-4 list-none"> 
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
 