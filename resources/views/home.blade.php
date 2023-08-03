<x-layout> {{-- Foi componentezado: estou chamando o layout que nunca munda pra home: --}}

    <x-slot:btn> {{-- Setando botão pra criar tarefa que irá pro layout--}}
        <h2 class="userName"> Bem-vindo(a) {{($AuthUser->name) ?? ''}} </h2>
        <a href="{{route('task.crate')}}" class="btn btn-primary" >
            Criar Tarefa
        </a>
        <a href="{{route('logout')}}" class="btn btn-logout" >
            Sair
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

    <script>
        async function taskUpdate(element){
            // alert(element.checked)// Estou imprimindo um alerta se o checkbox está marcado ou não
            let status = element.checked; //Se for false, ele estará desmarcando e se for true fará o inverso.
            let taskId = element.dataset.id; // 
            let url = '{{route('task.update')}}'; // O blade ja vai pegar a rota dinamicamente pra mim.
            let rawResult = await fetch(url, {
                method: 'POST',
                headers: {
                    'Content-type': 'application/json',
                    'accept': 'application/json'
                },
                body: JSON.stringify({status, taskId, _token: '{{ csrf_token() }}'}) 
            });
            result = await result.json();
            if (result.success) {
                alert('Task Atualizada com sucesso!');
            } else{
                element.checked = !status;
            }
         }
    </script>
</x-layout>
