<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except'=>['show','store','create','index']]);
        $this->middleware('guest', [
            'only' => ['create']
        ]);
    }
    public function index(){
        $users = User::paginate(10);

        return view('user.index',compact('users'));
    }
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
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
        Auth::login($user);
        session()->flash('success', '注册成功，你将开启新的旅程!');
        return redirect()->route('users.show', [$user]);
    }

    public function edit(User $user)
    {
        $this->authorize('update',$user);
        return view('user.edit', compact('user'));
    }

    public function update(User $user, Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'password' => 'required|confirmed|min:6'
        ]);
        $this->authorize('update',$user);
        $user->update([
            'name' => $request->name,
            'password' => bcrypt($request->password),
        ]);
        session()->flash('success', '个人资料更新成功！');
        return redirect()->route('users.show', $user->id);
    }

    public function destroy(User $user)
    {
        $this->authorize('destroy', $user);
        $user->delete();
        session()->flash('success','删除成功');
        return redirect()->back();
    }
}
