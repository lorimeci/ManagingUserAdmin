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

    public function forcedelete($id)
    {  

        $users = User::where('id',$id);
        //dd($users);
        $imagepath = public_path('images/' .$users->avatar);
        dd($imagepath);
        if(File::exists($imagepath)){
            File::delete($imagepath);
        }
        $users->forceDelete();
        // User::where('id',$id)->forceDelete();
        return redirect('/users/trashed');
    }
}
