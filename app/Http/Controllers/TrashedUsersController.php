<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class TrashedUsersController extends Controller
{
    public function trashed()
    {
        $users= User::onlyTrashed()->paginate(2);
        return view ('admin.trashed',compact('users'));
    }
    
    public function restore($id)
    {
        User::withTrashed()->findOrFail($id)->restore();
  
        return back();
    } 

    public function forcedelete(User $user, $id)
    {  
        
        $users = User::onlyTrashed()->findOrFail($id);
        $imagepath = public_path('images/' .$users->avatar);

            if(File::exists($imagepath)){
                unlink($imagepath);
            }
        $users->forceDelete();
        return redirect('/users/trashed');

    }
}
