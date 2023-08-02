<x-layout page="Register">

    <x-slot:btn> {{-- Setando botão pra criar tarefa que irá pro layout--}}

        <a href="{{route('login')}}" class="btn btn-primary" >
            Já possui conta? Faça login
        </a>
        <a href="" class="btn btn-primary" >
            Registre-se
        </a>
    </x-slot:btn>


    Tela de registro
</x-layout>

