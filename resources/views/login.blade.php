<x-layout page="Register">

    <x-slot:btn> {{-- Setando botão pra criar tarefa que irá pro layout--}}

        <a href="{{route('register')}}" class="btn btn-primary" >
            Registre-se
        </a>
    </x-slot:btn>
    <section id="task_section">
        <h1>Login</h1>
        <form method="POST" action="{{route('user.login_action')}}">
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

            <x-form.form_button submitTxt="login" resetTxt="Limpar"/>
    </section>
    <script>
    </script>
</x-layout>

