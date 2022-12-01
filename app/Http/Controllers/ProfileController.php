<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function edit(Request $request)
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     *
     * @param  \App\Http\Requests\ProfileUpdateRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProfileUpdateRequest $request)
    {
        DB::beginTransaction();
            try{
                $request->user()->fill($request->validated());
                 $users = User::findOrFail($request->user()->id);
                 //dd($users);
                if ($request->user()->isDirty('email')) { //if email has been edited since queried from db, or isnt saved at all
                    $request->user()->email_verified_at = null;
                }
                if($request->hasFile('avatar')){
                    //dd($request->hasFile('avatar'));
                   $imagepath = public_path('images/' .$request->user()->avatar);
                   //dd($imagepath);
                   if(File::exists($imagepath)){
                       File::delete($imagepath);
                   }else{
                     //$file = $request->user()->avatar;
                     //dd($file); //takes old file path we need the new file path ,the on ein the input
                       //dd($request->user()->avatar);
                       $file = $request->file('avatar'); // this way we have the new file path that for example is girl.png
                       //dd($file);
                       $name = time() .'-' .$request->name . '.' . $request->file('avatar')->extension();
                       //dd($name);
                       //$file = Storage::disk('image')->put('file', $name);
                      $file = $file->move(public_path('images') ,$name);
                       //dd($file);
                    //    $request->user()->avatar = $name;//this name path save it in the db
                      
                       $users->avatar = $name;
                       //dd($users->avatar);
                       //dd($$request ->avatar);
                   }
               }
                $users->phone = $request->user()->phone; 
                $users->address = $request->user()->address;
                
                $request->user()->save();
                DB::commit();
                return Redirect::route('profile.edit')->with('status', 'profile-updated');
        }catch(\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return back()->with('error', $e->getMessage());
        }
    }

}
