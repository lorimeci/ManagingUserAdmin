<link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
<div class="flex justify-center pt-2 ">
    <form action ="{{ route('uploadfile') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for ="csv_file"> Excel file </label>
                <input 
                type="file"
                class="block shadow-5xl mb-4  w-80 italic
                placeholder-gray-400"
                name="file">
                    @error('file')
                    <li class=" text-red-500  mb-4 list-none"> 
                        {{$message}}
                    </li>
                    @enderror

                <button type="submit" class="bg-green-500 block shadow-5xl mb-10 p-2 w-80 uppercase font-bold">
                    Upload
                </button>
            </div>
    </form>
</div>