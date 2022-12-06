<link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
<form action="{{ route('phone') }}" method="GET" enctype="multipart/form-data">
    @csrf
    <div class="flex space-x-2 justify-center">
        <div class="pt-4">
            <select class="form-control mb-4"  
            name="country" 
            value=""
            placeholder="Select Country" >
                <option value="" disabled selected> Select Country </option>     
                @foreach($dropdown as $row) 
                <option value="{{ $row->name }}"> {{ $row->name }} </option>
            @endforeach 
            </select>
        </div>    
        <div class="pt-4">    
          <input 
            type="text"
            class="block shadow-5xl mb-4 w-80 italic
            placeholder-gray-400"
            name="phone"
            id= "phone"
            placeholder="Phone"
            value="{{old('phone')}}">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
            @error('phone')
            <li class=" text-red-500 mb-4 list-none"> 
                {{$message}}
            </li>
            @enderror
        
        </div>    
        <div class="pt-4">    
            <button type="submit" class="bg-green-500 block shadow-5xl mb-4 p-2 w-80 uppercase font-bold">
                Validate
            </button>
          </div>  
    </div> 
</form>    

 

