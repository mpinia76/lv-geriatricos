<?php

namespace App\Http\Controllers\Admin;

use App\Model\admin\role;
use App\Model\admin\admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{

    // Middleware for Admin
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = admin::all();
        return view ('admin.user.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = role::all();
        return view('admin.user.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins',

            'password' => 'required|string|min:6|confirmed',
        ]);
        $request['password'] = bcrypt($request->password);
        $user = admin::create($request->all());
        $user->roles()->sync($request->role);
        return redirect(route('user.index'))->with('message','Usuario agregado con éxito');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = admin::find($id);
        $roles = role::all();
        return view('admin.user.edit',compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',

        ]);
        $user = admin::where('id',$id)->update($request->except('_token','_method','role'));
        admin::find($id)->roles()->sync($request->role);
        return redirect(route('user.index'))->with('message','Usuario modificado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $users = admin::find($id);
        $users->roles()->detach();
        $users->delete();
        return redirect (route('user.index'))->with('message','Admin User Deleted Successfully');
    }
}
