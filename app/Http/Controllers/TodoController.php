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
}
