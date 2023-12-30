<?php

namespace App\Http\Controllers;

use App\Models\tasks;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    //
    public function index(){
        $tasks = tasks::all();
        return view("index", compact("tasks"));
    }

    public function store(Request $request){
        $this->validate($request, [
            "name" => "required",
        ]);

        $task = new tasks();
        $task->name = $request->input("name");
        $task->save();

        return redirect()->route('index')->with('success', 'Task created successfully');
    }

    public function edit($id){
        $task = tasks::find($id);
        return view("edit", compact("task"));
    }

    public function update($id, Request $request){
        $this->validate($request, [
            "name" => "required",
        ]);

        $task = tasks::find($id);
        $task->name = $request->input("name");
        $task->save();
        return redirect()->route('index')->with('success', 'Task updated successfully');
    }

    public function delete($id){
        $task = tasks::find($id);
        $task->delete();
        return redirect()->route('index')->with('success', 'Task deleted successfully');
    }

    public function complete($id){
        $task = tasks::find($id);
        $task->completed = 1;
        $task->save();
        return redirect()->route('index')->with('success', 'Task done successfully');
    }
}
