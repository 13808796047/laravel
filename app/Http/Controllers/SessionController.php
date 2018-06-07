<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class SessionController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest', ['only' => ['create']]);
    }

    public function create()
    {
        return view('session.create');
    }

    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'email' => 'required|max:255',
            'password' => 'required'
        ]);
        if (Auth::attempt($data, $request->has('remember'))) {
            session()->flash('success', '欢迎回来!');
            return redirect()->route('users.show', [Auth::user()]);
        } else {
            session()->flash('danger', '抱歉,你的用户名或密码错误!');
            return redirect()->back();
        }
    }

    public function destroy()
    {
        Auth::logout();
        session()->flash('success', '你已经成功退出!');
        return redirect()->route('login');
    }
}
