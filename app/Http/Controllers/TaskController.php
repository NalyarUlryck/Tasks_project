<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(Request $r)
    {

    }
    public function create(Request $r)
    {
        $categories = Category::all();
        $data['categories'] = $categories;
        return view('tasks.create', $data);
    }

    public function create_action(Request $r)
    {
        $task = $r->only(['title', 'category_id', 'description', 'due_date']);
        $task['user_id'] =1;
        $dbTask = Task::create($task);
        return $dbTask;
    }

    public function edit(Request $r)
    {
        $id = $r->id;
        $task = task::find($id);
        if (!$task) {
            return redirect(route('home'));
        }
        $categories = Category::all();
        $data['categories'] = $categories;

        $data['task'] = $task;
        return view('tasks.edit', $data);
    }

    public function edit_action(Request $r)
    {
        $request_data =  $r->only(['title', 'due_date', 'category_id', 'description']);
        $request_data['is_done'] = $r->is_done ? true: false;
        $task = Task::find($r->id);
        if (!$task) {
            return 'Task não existe';
        }
        $task->update($request_data);
        $task->save();

        return redirect(route('home'));

    }
    public function delete(Request $r)
    {
        $id = $r->id;
        $task = Task::find($id);
        if ($task) {
            $task->delete();
        }
        return redirect(route('home'));
    }
}
