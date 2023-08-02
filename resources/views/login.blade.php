<x-layout page="Login">

    <x-slot:btn> {{-- Setando botão pra criar tarefa que irá pro layout--}}

        <a href="" class="btn btn-primary" >
            Entrar
        </a>
        <a href="{{route('register')}}" class="btn btn-primary" >
            Registre-se
        </a>
    </x-slot:btn>

    Tela de Loging
    <a href="{{route('home')}}">Home</a>
</x-layout>

