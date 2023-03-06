<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Task List";
        return view('task.index', [
            "title" => $title
        ]);
    }

    public function data(Request $request)
    {
        if ($request->key) {
            $task = Task::where('title', 'like', '%' . $request->key . '%')->orWhere('description', 'like', '%' . $request->key . '%')->get();

            return response()->json($task);
        } else {
            $task = Task::all();

            return response()->json($task);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTaskRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $task = new Task();
        $task->title = $request->title;
        $task->description = $request->description;
        $task->save();

        return response()->json([
            'status' => 200
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show($id_task)
    {
        $task = Task::with('Subtask')->where('id_task', $id_task)->first();

        return response()->json($task);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTaskRequest  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_tugas)
    {
        $task = Task::findOrFail($id_tugas);
        $task->title = $request->title;
        $task->description = $request->description;
        $task->save();

        return response()->json([
            'status' => 200
        ]);
    }

    public function updateStatus($id_tugas)
    {
        $task = Task::findOrFail($id_tugas);
        $task->status = $task->status == 1 ? 0 : 1;
        $task->save();

        return response()->json([
            'status' => 200
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_task)
    {
        $task = Task::findOrFail($id_task);
        $task->delete();

        if ($task) {
            return response()->json([
                'status' => 200
            ]);
        } else {
            return response()->json([
                'status' => 500
            ]);
        }
    }
}
