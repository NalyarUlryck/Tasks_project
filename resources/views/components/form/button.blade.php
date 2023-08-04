
{{--  AQUI ESTOU DEFININDO APENAS O BOTÃO --}}

<button type="{{$type}}" class=" {{$type === 'submit' ? ' btn btn-primary': 'btn btn-secondary'}}">{{$slot}}</button>

