<!DOCTYPE html>
<html>
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
</head>
<body>
      
<div class="container">
    <div class="text-center">
        {{-- font-bold text-5xl italic --}}
        <span class="text-warning mb-2  text-uppercase font-weight-bold w-100 p-3"> 
             Trashed Users
        </span>
    </div>
   
        <a href="{{ route('users') }}" class="btn btn-info mb-3">View All Users</a>
       
  
    <table class="table table-bordered data-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        {{-- @if(request()->has('view_deleted')) --}}
                            <a href="{{ route('users.restore', $user->id) }}" class="btn btn-success mb-1">Restore</a>
                        {{-- @else --}}
                            <form method="POST" action="{{ route('users.forcedelete', $user->id) }}">
                                @csrf
                                <input name="_method" type="hidden" value="DELETE">
                                <button type="submit" class="btn btn-xs btn-danger btn-flat show_confirm" data-toggle="tooltip" title='Delete'> Force Delete</button>
                            </form>
                        {{-- @endif --}}
                    </td>
                </tr>
             
            @endforeach
        </tbody>
    </table>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    {{ $users->links() }}
    {{-- @php dd($users->links()); @endphp --}}

</div>
     
</body> 
  
<script type="text/javascript">
    $('.show_confirm').click(function(e) {
        if(!confirm('Are you sure you want to delete this?')) {
            e.preventDefault();
        }
    });
</script>
  
</html>