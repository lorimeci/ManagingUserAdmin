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
          <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
            {{ $user->id}}
          </td>
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
                 class=" px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"
                 href="/users/{{ $user->id}}/show">
                  Show 
                </a>
                <a 
                  class="px-6 py-2.5 bg-green-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-green-700 hover:shadow-lg focus:bg-green-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-green-800 active:shadow-lg transition duration-150 ease-in-out"
                  href="users/{{ $user->id}}/edit">
                      Edit 
                </a>
                @if ($user->id == 1)
                    <a
                    class="pb-2  italic text-red-500">
                      {{-- Disabled Delete --}}
                    </a>
                    @else
                      <form action="users/{{$user->id}}/delete" class="pt-3" method="POST">
                        @csrf
                        @method('delete')
                        <button 
                        type="submit"
                        class=" px-6 py-2.5 bg-red-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out">
                        Delete 
                        </button>
                      </form>
                @endif
              @endif
          </td>
        </tr>
      @endforeach
      </tbody>
    </table>