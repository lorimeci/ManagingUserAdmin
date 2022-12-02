<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Traits\FileUploader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class TrashedUsersController extends Controller
{
    use FileUploader;
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
        
        $users = User::onlyTrashed()->findOrFail($id);
        $users->avatar = $this->deleteFile($users);
    
        $users->forceDelete();
        return redirect('/users/trashed');

    }
}
