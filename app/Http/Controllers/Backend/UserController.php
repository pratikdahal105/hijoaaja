<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public $path = 'backend.pages.';

    public function index(){
        $users = User::with('role')->get();
        return view($this->path.'user.list', compact('users'));
    }

    public function userCreate(Request $request){
        if ($request->isMethod('get')) {
            $user = null;
            $roles = Role::all();
            return view($this->path . 'user.create', compact('user', 'roles'));
        }
        if ($request->isMethod('post')) {
            $request->validate([
                'email' => 'required|unique:users',
                'name' => 'required',
                'role_id' => 'required',
                'password' => 'required|confirmed|min:6',
            ]);
            try {
                $data = new User();
                $data['email'] = $request->email;
                $data['name'] = $request->name;
                $data['role_id'] = $request->role_id;
                $data['password'] = Hash::make($request->password);
                $data->save();
                return redirect()->route('user.list')->with('success', 'User Created Successfully!');
            }catch (\Exception $e){
                return redirect()->back()->with('error', 'Make Sure All Required Fields are Filled!');
            }

        }
    }

    public function userEdit(Request $request, $id){
        if ($request->isMethod('get')) {
            $user = User::where('id', $id)->with('role')->first();
            $roles = Role::all();
            return view($this->path . 'user.edit', compact('user', 'roles'));
        }
        if ($request->isMethod('post')) {
            $data = User::where('id', $id)->first();
            $request->validate([
                'email' => 'required|unique:users,email,'.$data->id,
                'name' => 'required',
                'role_id' => 'required',
            ]);
            try {
                $data['email'] = $request->email;
                $data['name'] = $request->name;
                $data['role_id'] = $request->role_id;
                $data['edited_by'] = Auth::user()->id;
                if($request->password){
                    $data['password'] = Hash::make($request->password);
                }
                $data->update();
                return redirect()->route('user.list')->with('success', 'User Edited Successfully!');
            }catch (\Exception $e){
                return redirect()->back()->with('error', 'Make Sure All Required Fields are Filled!');
            }

        }
    }

    public function userDelete(Request $request){
        $user = User::where('id', $request->id)->first();
        $data['edited_by'] = Auth::user()->id;
        $user->update($data);
        $user->delete();
        return redirect()->route('user.list')->with('warning', 'User Deleted Successfully!');
    }

    public function passwordChange(Request $request){
        if ($request->isMethod('get')) {
            return view($this->path . 'user.changePassword');
        }

        if ($request->isMethod('post')) {
            $request->validate([
                'old_password' => 'required',
                'password' => 'required|confirmed|min:6',
            ]);
//            dd($request->all());
            $user = new User();
            if(Hash::check($request->old_password, Auth::user()->password)){
                $data['password'] = Hash::make($request->password);
                if($user->where('id', Auth::user()->id)->update($data)){
                    return redirect()->back()->with('success', 'password update successful!');
                }
            }
            else{
                return redirect()->back()->with('error', 'Password verification failed!');
            }
        }
    }

}
