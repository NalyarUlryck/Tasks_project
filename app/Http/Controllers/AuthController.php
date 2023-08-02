<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index (Request $r)
    {
        return view('login');
    }

    public function login_action(Request $r)
    {
        $validator = $r->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);
        if(Auth::attempt($validator)){
            return redirect()->route('home'); // Estou verificando se o usuário está autenticado e o redirecoinando para página inicial.  pode ser usado dessa forma também: redirect(route('home'))
        }
    }

    public function register(Request $r)
    {
        return view('register');
    }

    public function register_action(Request $r)
    {
        $r->validate([ // Com o validate consigo definir regras para preenchimento dos dados
            'name' => 'required', // deve ser preenchiddo
            'email' => 'required|email|unique:users', // deve ser preenchido, do tipo email, e único em users.
            'password' => 'required|min:6|confirmed', // deve ser preenchido, min de 6 caracteres, confirma senha
        ]);


        $data =$r->only('name', 'email', 'password');
        $userCreated = User::create($data);
        return redirect(route('login'));
    }
}
