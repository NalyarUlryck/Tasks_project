<x-layout page="Create">

    <x-slot:btn> {{-- Setando botão pra criar tarefa que irá pro layout--}}

        <a href="{{route('home')}}" class="btn btn-primary" >
            Voltar
        </a>
    </x-slot:btn>

    <section id="task_section">
        <h1>Criar Tarefa</h1>
        <form method="POST" action="{{route('task.create_action')}}">
            @csrf {{-- Token criado quando se envia o fomulario para validação da próxima página --}}
            <x-form.text_input
                name="title"
                label="Título da tarefa"
                placeholder="Digite o título da tarefa"
                required="required"/>
            <x-form.text_input
                type="datetime-local"
                name="due_date"
                label="Data de realização"
                required="required"/>
            <x-form.select_input name="category_id" label="Categoria" required="required">
               @foreach ($categories as $category)

               <option value="{{$category->id}}"> {{$category->title}} </option>

               @endforeach
            </x-form.select_input>
            <x-form.textarea_input
                label="Descrição da tarefa"
                id="description"
                name="description"
                placeholder="Digite uma descrição para sua tarefa"
                required="required"/>
            <x-form.form_button submitTxt="Criar tarefa" resetTxt="Reset"/>
    </section>
</x-layout>

