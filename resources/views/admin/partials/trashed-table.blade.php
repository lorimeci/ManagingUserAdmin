    <table class="min-w-full">
        <thead class="border-b">
            <tr>
                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                Id
                </th>
                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                Name
                </th>
                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                    Email
                </th>
                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                Role
                </th>
                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                    Avatar Image
                    </th>
                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                Action
                </th>
            </tr>
       </thead>
        <tbody>
            @foreach ($users as $user)
                <tr class="border-b">
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                        {{ $user->id}}
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                     {{ $user->name}}
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                        {{ $user->email}}
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                    {{ $user->role}}
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                        <img 
                        src="{{ asset('images/' . $user->avatar ?? '' )}}" 
                        class="rounded-full w-32 mb-4 mx-auto"
                        alt="Avatar">
                        </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                        @if(isset(Auth::user()->id))  
                            <div class=" flex-col space-y-2 ">             
                                <a href="{{ route('users.restore', $user->id) }}" class="  px-6 py-2.5 bg-green-500 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-green-600 hover:shadow-lg focus:bg-green-600 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-green-700 active:shadow-lg transition duration-150 ease-in-out">
                                    Restore
                                </a>
                                <form method="POST" action="{{ route('users.forcedelete', $user->id) }}">
                                    @csrf
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button type="submit" class="  px-6 py-2.5 bg-red-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out"
                                    data-toggle="tooltip" title='Delete'> 
                                        Force Delete
                                    </button>
                                </form>
                            </div>    
                        @endif
                    </td>
              </tr>
           @endforeach
        </tbody>
    </table>