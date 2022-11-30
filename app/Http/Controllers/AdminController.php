<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidationRequest;
use App\Http\Requests\ValidationUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File as FacadesFile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Symfony\Component\Console\Input\Input;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::paginate(2);
        return view('admin.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidationRequest $request)
    {
        DB::beginTransaction();
        try{
            $request ->validated();
            $newImageName = time() .'-' .$request->name . '.' . $request->avatar->extension();
            $request->avatar->move(public_path('images'),$newImageName);
      
            $users=User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
                'password' =>Hash::make($request->input('password')),
                'address' => $request->input('address'),
                'role' => $request->input('role'),
                'avatar' => $newImageName,
            ]);
        
        DB::commit();
        return redirect('/users');
        }catch(\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $users = User::find($id);
        return view('admin.show')->with('users',$users);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::find($id);
        return view('admin.edit')->with('users',$users);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ValidationUpdateRequest $request, $id)
    { 
        DB::beginTransaction();
        try {
                $request ->validated();
                $users = User::find($id);
                    if($request->hasFile('avatar')){
                         $imagepath = public_path('images/' .$users->avatar);
                        if(FacadesFile::exists($imagepath)){
                            FacadesFile::delete($imagepath);
                        }else{
                            $file = $request->file('avatar');
                            $name = time() .'-' .$request->name . '.' . $request->avatar->extension();
                            $file = $file->move(public_path('images') ,$name);
                            $users ->avatar = $name;
                        }
                    }
                $users->name = $request->input('name'); 
                $users->email = $request->input('email');
                $users->phone = $request->input('phone'); 
                $users->address  = $request->input('address');  
                $users->update();
               
                 DB::commit();
                 return redirect('/users');
        }catch(\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return back()->with('error', $e->getMessage());
        }
  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=User::findOrFail($id)->delete();
        return redirect('/users');
    }
}
