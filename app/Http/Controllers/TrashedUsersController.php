<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class TrashedUsersController extends Controller
{
    public function trashed()
    {
        $users= User::onlyTrashed()->paginate(4);
        return view('admin.trashed',compact('users'));
    }
    
    public function restore($id)
    {
        User::withTrashed()->find($id)->restore();
  
        return back();
    } 

    public function forcedelete($id)
{
    User::where('id', $id)->forceDelete();
    return redirect('/users/trashed');
}
}
