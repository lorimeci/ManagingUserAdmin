<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidationRequest;
use App\Http\Requests\ValidationUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
        return redirect('/users');
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
        $request ->validated();
        if( isset($request->avatar) )
        {
           $name = $request->file('avatar')->getClientOriginalName();
          $request->file('avatar')->storeAs('public/images', $name);
        }
        $newImageName = time() .'-' .$request->name . '.' . $request->avatar->extension();
        $request->avatar->move(public_path('images'),$newImageName);
        $users=User::where('id',$id)
           ->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'address' => $request->input('address'),
            'avatar' => $newImageName

        ]);
        return redirect('/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=User::find($id)->delete();
        return redirect('/users');
    }
}
