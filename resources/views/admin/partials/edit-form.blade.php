<link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
<div class="flex justify-center pt-20">
    <form action="/users/{{ $users->id }}/update" method="POST" enctype="multipart/form-data">
     @csrf
     @method('PATCH')
     <div class="block">
         @if(isset(Auth::user()->id)) 
         <input 
         type="text"
         class="block shadow-5xl mb-4 w-80 italic
         placeholder-gray-400"
         name = "name"
         value = "{{$users->name}}">
                @error('name')
                <li class=" text-red-500 mb-2 list-none"> 
                    {{$message}}
                </li>
                @enderror 
         <input  
         type="text"
         class="block shadow-5xl mb-4  w-80 italic
         placeholder-gray-400"
         name="email"
         value = "{{$users->email}}">
                @error('email')
                <li class=" text-red-500 mb-4 list-none"> 
                    {{$message}}
                </li>
                @enderror
         <input 
         type = "text"
         class = "block shadow-5xl mb-4  w-80 italic
         placeholder-gray-400"
         name = "phone"
         value = "{{$users->phone}}">
                @error('phone')
                <li class=" text-red-500 mb-4 list-none"> 
                    {{$message}}
                </li>
                @enderror
         <input 
         type = "text"
         class = "block shadow-5xl mb-4  w-80 italic
         placeholder-gray-400"
         name = "address"
         value = "{{$users->address}}">
                @error('address')
                <li class=" text-red-500 mb-4 list-none"> 
                    {{$message}}
                </li>
                @enderror
         <input 
         type="file"
         class="block shadow-5xl mb-4 w-80 italic
         placeholder-gray-400"
         name="avatar"
         value = "{{asset('images/' .$users->avatar)}}">
                @error('avatar')
                <li class=" text-red-500 mb-4 list-none"> 
                    {{$message}}
                </li>
                @enderror

         <button type ="submit" class="bg-green-500 block shadow-5xl mb-10 p-2 w-80 uppercase font-bold">
             Submit
         </button>
      @endif 
     </div>   
    </form>
 </div>
