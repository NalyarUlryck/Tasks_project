
{{--  AQUI ESTOU DEFININDO APENAS O BOTÃO --}}

<button type="{{$type}}" class="btn {{$type === 'submit' ? 'btn-primary': 'btn-secondary'}}">{{$slot}}</button>

