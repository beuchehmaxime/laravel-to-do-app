<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
    //  * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::where('user_id', '=', Auth::user()->id)->latest('id')->get();
        $taskcount = Task::where('user_id', '=', Auth::user()->id)->count();
        $pendingtask = Task::where('iscompleted','=', 0)->where('endtime','>', now())->where('user_id', '=', Auth::user()->id)->count();
        $completedtask = Task::where('iscompleted','=', 1)->where('user_id', '=', Auth::user()->id)->count();
        $expiredtask = Task::where('endtime','<', now())->where('user_id', '=', Auth::user()->id)->count();
        return view('user.index',compact('tasks','pendingtask','taskcount','completedtask','expiredtask'));
    }

    /**
     * Show the form for creating a new resource.
     *
    //  * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.createtask');        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id = Auth::user()->id;
        $request->validate([
            'task_title' => 'required',
            'start_date' => 'required',
            'end_date' => 'required'
        ]);
        $now = now();
        Task::insert([
            'tasktitle' => $request->task_title,
            'taskdescription' => $request->task_description,
            'starttime' => $request->start_date,
            'endtime' => $request->end_date,
            'user_id' => $user_id,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        return redirect()->back()->with('success','Task Added Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
    //  * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
    //  * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::findOrFail($id);
        return view('user.edittask', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
    //  * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user_id = Auth::user()->id;
        $request->validate([
            'task_title' => 'required',
            'start_date' => 'required',
            'end_date' => 'required'
        ]);
        $iscompleted = $request->iscompleted ? 1 : 0;
        $now = now();
        Task::whereId($id)->update([
            'tasktitle' => $request->task_title,
            'taskdescription' => $request->task_description,
            'starttime' => $request->start_date,
            'endtime' => $request->end_date,
            'iscompleted' => $iscompleted,
            'user_id' => $user_id,
            'updated_at' => $now,
        ]);

        return redirect()->back()->with('success','Task Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
    //  * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Task::findOrFail($id)->delete();
        return redirect()->back()->with('success','Task Deleted Successfully.');
    }
}
