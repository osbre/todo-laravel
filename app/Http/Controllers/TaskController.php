<?php

namespace App\Http\Controllers;

use App\Task;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UpdateUserTask;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::where('user_id', Auth::id())->latest()->paginate(10);
        return view('tasks.index')->with('tasks', $tasks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $task = $this->validate(request(), [
          'name'        => 'required|max:150;',
        ]);
        

        Task::create([
            'name' => request('name'),
            'description' => request('description'),
            'user_id' => Auth::id(),
        ]);

        return back()->with('success', 'task has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        if($task->user_id == Auth::id()){
            return view('tasks.show')->with('task', $task);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        if($task->user_id == Auth::id()){
            return view('tasks.edit')->with('task', $task);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param integer $id
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update($id, UpdateUserTask $request)
    {    
        $task = Task::findOrFail($id);
        if($request->user_id == Auth::id()){
            $task->update($request->all());
        }
        return back()->with('success', 'task has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  integer $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::find($id);
        if($task->user_id == Auth::id()){
            $task->delete();

            return redirect('/tasks')->with('success', 'Task has been deleted!!');
        }
    }
        
    /**
     * complete the task
     *
     * @param  integer $id
     * @return \Illuminate\Http\Response
     */
    public function complete($id)
    {
        $task = Task::find($id);
        if($task->user_id == Auth::id()){
            if(!$task->complete){
                $task->complete = true;
            }else{
                $task->complete = false;            
            }
            $task->save();

            return redirect('/tasks')->with('success', 'Task has been completed!');
        }
    }
}
