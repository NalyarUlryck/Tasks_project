<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index (Request $r)
    {
        $isloggedin = Auth::check(); // Se o usuário estiver logado ele vai continuar em home.
        if ($isloggedin) 
        {
            return redirect()->route('home');
        }
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
       
        // if (Auth::user()) {// A mesma função da Auth::check(), mas é melhor este pois o user traz tudo.
        //     return redirect(route('home'));
        // }

        //Deixando mais verboso ou melhor de entender:
        $isloggedin = Auth::check(); // Estou armazenando a checagem numa variável 
        if ($isloggedin) { // Verifico se o usuário está logado
            return redirect(route('home')); // não permito que ele acesse a página de cadastro.
        }

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

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
