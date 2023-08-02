<x-layout> {{-- Foi componentezado: estou chamando o layout que nunca munda pra home: --}}

    <x-slot:btn> {{-- Setando botão pra criar tarefa que irá pro layout--}}

        <a href="{{route('task.crate')}}" class="btn btn-primary" >
            Criar Tarefa
        </a>

    </x-slot:btn>

    <section class="graph">
        {{-- <h2>Bem-vindo {{$AuthUser->name}} </h2> Aqui estou chamando o usuário que foi autenticado. --}}
        <div class="graph_header">
            <h2>Progresso do dia</h2>
            <div class="graph_header-line"></div>
            <div class="graph_header-date">
                <img src="/assets/images/icon-prev.png" alt="" srcset="">
                13 de Dez
                <img src="/assets/images/icon-next.png" alt="" srcset="">
            </div>
        </div>
        <div class="graph_header-subtitle">
            Tarefas: <strong>3/6</strong>
        </div>
        <div class="graph-placeholder"></div>
        <div class="task_left_footer">
            <img src="/assets/images/icon-info.png" alt="" srcset="">
            Restam 3 tarefas para serem realizadas
        </div>
    </section>
    <section class="list">
        <div class="list_header" >
            <select name="" class="list_header-select" id="">
                <option value="1">Todas as tarefas</option>
            </select>
        </div>
        <div class="task_list">

            @foreach ($tasks as $task )
            <x-task :data=$task/>
            @endforeach

        </div>
    </section>
</x-layout>
