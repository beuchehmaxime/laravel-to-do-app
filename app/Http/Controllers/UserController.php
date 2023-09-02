<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(){        
        $tasks = Task::where('iscompleted','=', 0)->where('endtime','>', now())->where('user_id', '=', Auth::user()->id)->get();
        return view('user.pendingtask',compact('tasks'));
    }

    public function expiredTask(){
        $tasks = Task::where('endtime','<', now())->where('user_id', '=', Auth::user()->id)->get();
        return view('user.expiredtask',compact('tasks'));
    }
    
    public function completedTask(){
        $tasks = Task::where('iscompleted','=', 1)->where('user_id', '=', Auth::user()->id)->get();
        return view('user.completedtask',compact('tasks'));
    }
    public function logout(Request $request): RedirectResponse
    {
        echo 'lkadfjldf';
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

}
