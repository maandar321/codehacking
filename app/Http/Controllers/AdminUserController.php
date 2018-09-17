<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserEditRequest;
use App\Http\Requests\UserRequest;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Session;


class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {    $users = User::all();
        return view('admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();

        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {


//sddsaddasd////        if($request->file('photo_id')){
//////            $file = $request->file('photo_id');
//////            $name = $file->getClientOriginalName();
//////
//////            $file->move('images',$name);
//////
//////        }
//////
//////
//////        $input = $request->all();
//////        $input['photo_id'] = $name;
//////        User::create($input);

        if($request->file('photo_id')){

            $file =$request->file('photo_id');
            $name=$file->getClientOriginalName();
            $file->move('images',$name);
        }

        $input=$request->all();
        $input['photo_id']=$name;
        User::create($input);




        return redirect('admin/users');
//                return $request->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user=User::findOrFail($id);

        $roles=Role::all();
        return view('admin.users.edit',compact('user','roles' ));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserEditRequest $request,$id)
    {

        $users=User::findOrFail($id);

        $input=$request->all();
        if($request->file('photo_id')){

            $file =$request->file('photo_id');
            $name=$file->getClientOriginalName();
            $file->move('images',$name);
            $input['photo_id']=$name;
        }
        if($input['password'] == null){
            unset($input['password']);
        }

        $users->update($input);
        return redirect('admin/users');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {


      User::findorFail($id)->delete();

//      unlink(public_path().$user->photo->file);
//      $user->delete();

        Session::flash('deleted_user','The user has been deleted');


        return redirect('admin/users');

    }
}
