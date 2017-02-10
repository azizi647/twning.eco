<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\User;
class UsersController extends Controller
{
   public function index()
    {
        $users = User::all();
        return view('adminpanel.users.list', ['users'=>$users]);
    }

    
    public function create()
    {
//        $roles = DB::table('roles')->get();
//        return view('adminpanel.users.add')->with('roles',$roles);
        return view('adminpanel.users.add');
    }

    public function store(Request $request)
    {

        $rules = [            
            'name'       => 'required|unique:users',
            'email'      => 'required|email|unique:users',
            'password'   => 'required',
            'password_confirmation'   => 'required|same:password',
        ];       
        

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect('twadm/users/create')
                        ->withErrors($validator)
                        ->withInput();
        }


        $user = new User(array(
            'email'     => $request->get('email'),
            'name'      => $request->get('name'),
            'password'  => bcrypt($request->get('password')),
        )); 

        
        $user->save();

        $request->session()->flash('alert-success', 'User was successful added!');
        return Redirect::to('/twadm/users/create');
        
    }



    public function edit($id)
    {
        $user = User::find($id);
//        $roles = DB::table('roles')->get();
        return view('adminpanel.users.edit')->with('user',$user);
    }


    public function update(Request $request, $id)
    {

         $rules = [            
            'name'       => 'required',
            'email'      => 'required|email',
            'password'   => 'required',
            'password_confirmation'   => 'required|same:password',
        ];       
        

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect('twadm/users/'.$id.'/edit')
                        ->withErrors($validator)
                        ->withInput();
        }else{
            User::where(['id' => $id])->update([
                'email'     => $request->get('email'),
                'name'       => $request->get('name'),
                'password'   => bcrypt($request->get('password')),
            ]);
            $request->session()->flash('alert-success', 'User was successful updated!');
            return Redirect::to('/twadm/users/'.$id.'/edit');
        }

        
    }

    public function destroy($id)
    {
        User::where('id', $id)->delete();

        return Redirect::to('/twadm/users');
    }
}
