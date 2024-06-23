<table class="min-w-full">
    <thead class="border-b">
      <tr>
          <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
            Id
          </th>
          <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
             Country Name
          </th>
          <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
            Phone Code
          </th>
      </tr>
    </thead>
  <tbody>  
    @foreach ($countries as $country )
    <tr class="border-b">
      <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
        {{ $country->id}}
      </td>
      <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
          {{ $country->name}}
      </td>
      <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
          {{ $country->code}}
      </td>
  
    </tr>
    @endforeach

  </tbody>
</table>