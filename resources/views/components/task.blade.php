<div class="task">
    <div class="title">
        <input type="checkbox"

        onchange="taskUpdate(this)" {{-- Passei uma função para verificar a alteração que teve (js) --}}
        data-id="{{$data['id']}}" {{-- Estou pegando o id da task diretamente e passar pra esse elemento --}}

            {{-- @if (isset($data) && $data['is_done'])
                checked
            @endif --}}
            {{ ($data['is_done'] ?? null) && $data['is_done'] ? 'checked': null}}
            {{-- {{$data['is_done'] ?? null}} --}}
        />
        <div class="task_title">{{$data['title'] ?? '' }}</div class="">
    </div>
    <div class="priority">
        <div class="sphere"></div>
        <div>{{$data['category']->title ?? ''}}</div>
    </div>
    <div class="actions">
        <a href="{{route('task.edit', ['id' => $data['id']])}}">
            <img src="/assets/images/icon-edit.png" alt="" srcset="">
        </a>
        <a href="{{route('task.delete', ['id' => $data['id']])}}">
            <img src="/assets/images/icon-delete.png" alt="" srcset="">
        </a>
    </div>
</div>
