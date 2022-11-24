<link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
<div class="m-auto w-4/5 py-24">
    <div class="text-center">
        <div class="mb-4" >
        <img 
        src="{{ asset('images' . $users->avatar)}}" 
        class="rounded-full w-32 mb-4 mx-auto"
        alt="Avatar">
        </div>
        <h1 class="text-5xl uppercase bold"> 
            {{$users->name}}
        </h1>
    </div>
    <div class="py-10 text-center">
    
        <div class="m-auto">
           
            <span class="uppercase text-blue-500 font-bold text-xs italic"> 
                Email  : {{ $users->email}}
            </span>
          
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