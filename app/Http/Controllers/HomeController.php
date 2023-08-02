<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(Request $r)
    {
        $tasks = Task::all()->take(6);
        $AuthUser = Auth::user(); // Estou setando o usuário logado em home
        return view('home', ['tasks' => $tasks, 'AuthUser' => $AuthUser]); // podendo chamar tantos os dados da taks como os do usuário que foi autenticado.

    }
}
