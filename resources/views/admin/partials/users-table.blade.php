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
          Role
        </th>
        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
           Email
          </th>
        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
          Action
        </th>
      </tr>
    </thead>
    <tbody>
     @foreach ($users as $user)
      <tr class="border-b">
        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $user->id}}</td>
        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
            {{ $user->name}}
        </td>
        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
            {{ $user->role}}
        </td>
        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
            {{ $user->email}}
        </td>
        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
            @if(isset(Auth::user()->id))
              <a 
               class="border-b-2 pb-2 border-dotted italic text-blue-500"
               href="/users/{{ $user->id}}/show">
                Show &rarr;
                </a>
                <a 
                class="border-b-2 pb-2 border-dotted italic text-green-500"
                href="users/{{ $user->id}}/edit">
                    Edit &rarr;
                </a>
                @if ($user->id== 1)
                <a
                class="border-b-2 pb-2 border-dotted italic text-red-500">
                   {{-- Disabled Delete --}}
                </a> 
                {{-- <button type="button" 
                class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md focus:outline-none focus:ring-0 transition duration-150 ease-in-out pointer-events-none opacity-60" 
                disabled>Primary</button> --}}
                @else
                  <form action="users/{{$user->id}}/delete" class="pt-3" method="POST">
                    @csrf
                    @method('delete')
                    <button 
                    type="submit"
                    class="border-b-2 pb-2 border-dotted italic text-red-500">
                    Delete &rarr;
                    </button>
                  </form>
                @endif
            @endif
        </td>
      </tr>
    @endforeach
    </tbody>
  </table>