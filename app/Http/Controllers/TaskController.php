<?php

namespace App\Http\Controllers;

use App\Task;
use App\Http\Requests\TaskRequest;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Task::class, 'task');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = auth()->user()->tasks()->latest()->paginate(10);
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaskRequest $request)
    {
        auth()->user()->tasks()->create([
            'name' => request('name'),
            'description' => request('description'),
        ]);

        return back()->with('success', 'task has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Task $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        return view('tasks.show')->with('task', $task);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        return view('tasks.edit')->with('task', $task);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Task $task
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function update(Task $task, TaskRequest $request)
    {
        $task->update($request->all());

        return back()->with('success', 'task has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $task->delete();

        return redirect('/tasks')->with('success', 'Task has been deleted!');
    }

    /**
     * complete the task
     *
     * @param integer $id
     * @return \Illuminate\Http\Response
     */
    public function complete($id)
    {
        $task = auth()->user()->tasks()->findOrFail($id);

        if (!$task->is_completed) {
            $task->is_completed = true;
        } else {
            $task->is_completed = false;
        }
        $task->save();

        return redirect('/tasks')->with('success', 'Task has been completed!');
    }
}
