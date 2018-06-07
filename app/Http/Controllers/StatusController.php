<?php

namespace App\Http\Controllers;

use App\Models\Status;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;

class StatusController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        return view('statuses.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'content' => 'required|max:255',
        ]);
        Auth::user()->statuses()->create([
            'content' => $request['content'],
        ]);
        return redirect()->back();
    }

    public function destroy(Status $status)
    {
        $this->authorize('destroy', $status);
        $status->delete();
        session()->flash('success', '删除成功');
        return redirect()->back();
    }
}
