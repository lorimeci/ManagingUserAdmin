<div class="flex space-x-2 justify-center">
    @if (Auth::user())
         <div class="pt-4">
             <a href="users/create"
             class="px-6 py-3 text-blue-100 no-underline bg-blue-500 rounded hover:bg-blue-600  hover:text-blue-200">
                 Add a new user
             </a>
         </div>
         <div class="pt-4">
             <a href="users/trashed"
             class="px-6 py-3 text-blue-100 no-underline bg-red-500 rounded hover:bg-red-600  hover:text-red-200">
                 Trashed Users
             </a>
         </div>
 </div>

 @else
 <p class="py-12 italic">
     Please login in to add a new user.
 </p>
@endif