<x-layout page="Edit">

    <x-slot:btn> {{-- Setando botão pra criar tarefa que irá pro layout--}}

        <a href="{{route('home')}}" class="btn btn-primary" >
            Voltar
        </a>
    </x-slot:btn>

    <section id="task_section">
        <h1>Editar Tarefa</h1>
        <form method="POST" action="{{route('task.edit_action')}}">
            @csrf {{-- Token criado quando se envia o fomulario para validação da próxima página --}}
            <input type="hidden" name="id" value="{{$task->id}}"/>

            <x-form.checkbox_input
                name="is_done"
                label="Tarefa realizada?"
                required="required"
                :checked="$task->is_done"
            />

            <x-form.text_input
                type="datetime-local"
                name="due_date"
                label="Data de realização"
                required="required"
                :value="$task->due_date"
            />
            <x-form.select_input name="category_id" label="Categoria" required="required">
               @foreach ($categories as $category)

               <option value="{{$category->id}}"
                @if ($category->id == $task->category_id)
                    selected
                @endif
            >{{$category->title}} </option>


               @endforeach
            </x-form.select_input>
            <x-form.textarea_input
                label="Descrição da tarefa"
                id="description"
                name="description"
                placeholder="Digite uma descrição para sua tarefa"
                required="required"
                :value="$task->description"
            />

            <x-form.form_button submitTxt="Atualizar tarefa" resetTxt="Reset"/>
    </section>
</x-layout>

