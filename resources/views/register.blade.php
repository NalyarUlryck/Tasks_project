<x-layout page="Register">

    <x-slot:btn> {{-- Setando botão pra criar tarefa que irá pro layout--}}

        <a href="{{route('login')}}" class="btn btn-primary" >
            Já possui conta? Faça login
        </a>
    </x-slot:btn>
    <section id="task_section">
        <h1>Registre-se</h1>
        <form method="POST" action="{{route('user.register_action')}}">
            @csrf {{-- Token criado quando se envia o fomulario para validação da próxima página --}}
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                 @endforeach
            @endif
            {{-- flashmsg para erro na tela de login --}}
            @if (session()->has('loginError'))
                <div>
                    <li>{{ session()->get('loginError') }}</li>
                </div>
            @endif
            <x-form.text_input
                name="name"
                label="Nome"
                placeholder="Digite seu nome"
                />
                <x-form.text_input
                type="email"
                name="email"
                label="Email"
                placeholder="Digite seu email"
                />
                <x-form.text_input
                type="password"
                name="password"
                label="Senha"
                placeholder="Digite sua senha"
                />
                <x-form.text_input
                type="password"
                name="password_confirmation"
                label="Confirme sua senha"
                placeholder="Digite sua senha novamente"
                />
            <x-form.form_button submitTxt="Regitrar-se" resetTxt="Limpar"/>
    </section>
</x-layout>

