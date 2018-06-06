<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Auth;
class UserController extends Controller
{
    public function create()
    {
        return view('user.create');
    }

    //用户展示
    public function show(User $user)
    {
        return view('user.show', compact('user'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:50',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|confirmed|min:6'
        ]);
        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password)
        ]);
        Auth::login($user);
        session()->flash('success','注册成功，你将开启新的旅程!');
        return redirect()->route('users.show',[$user]);
    }

    public function logout()
    {
        
    }
}
