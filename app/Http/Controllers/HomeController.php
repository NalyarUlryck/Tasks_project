<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(Request $r)
    {
        // $tasks = Task::whereDate('due_date', date('Y-m-d') )->get(); // por padrão ele vai pegar pela data do dia
        // $AuthUser = Auth::user(); // Estou setando o usuário logado em home
        // return view('home', ['tasks' => $tasks, 'AuthUser' => $AuthUser]); // podendo chamar tantos os dados da taks como os do usuário que foi autenticado.

        $data['tasks'] = Task::whereDate('due_date', date('Y-m-d'))->get();
        $data['AuthUser'] = Auth::user();
        $data['tasks_count'] = $data['tasks']->count(); // quantidade de tarefas
        $data['undone_tasks_count'] = $data['tasks']->where('is_done', false)->count(); // quantidade de tarefas que faltam
        return view('home', $data);

    }
}
