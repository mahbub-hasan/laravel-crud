<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegistrationRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function registrationPage(){
        $roles = Role::all();
        return view('registration',compact('roles'));
    }

    public function loginPage(){
        return view('login');
    }

    public function doRegistration(RegistrationRequest $request){

        if ($request->input('gender')==='Male'){
            $gender = 'M';
        }else if ($request->input('gender')==='Female'){
            $gender = 'F';
        }else{
            $gender = 'O';
        }

        $user = User::create([
            'first_name'=>$request->input('first_name'),
            'last_name'=>$request->input('last_name'),
            'username'=>$request->input('username'),
            'password'=>Hash::make($request->input('password')),
            'gender'=>$gender,
            'dob'=>$request->input('dob')
        ]);

        $user->roles()->sync([$request->input('role')]);

        return redirect()->route('user.login');
    }

    public function doLogin(LoginRequest $request){
        $user = User::where('username',$request->input('username'))->first();

        if ($user == null){
            return redirect()->back()->with(['error'=>'No user found']);
        }

        if (!Hash::check($request->input('password'),$user->password)){
            return redirect()->back()->with(['error'=>'Password not matches!']);
        }

        $request->session()->put('user_id',$user->id);

        return redirect()->route('todo.index');
    }

    public function logout(){
        session()->flash('user_id');
        return redirect()->route('user.login');
    }

}
