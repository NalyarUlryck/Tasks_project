<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$page ?? 'Home'}}</title> {{-- Estou verificando se foi definido algum valor pra page, docontrário receberá Home.--}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
    <div class="container" > {{-- Essa div serve pra abrigar toda aplicação.--}}
        <div class="sidebar" >
            <img src="/assets/images/logo.png" alt="" srcset="">
        </div>
        <div class="content">
            <nav>
                
                {{$btn ?? null}} {{-- Aqui vou receber os tipos de botões que irei setar--}}
            </nav>
            <main>
                {{$slot}} {{-- Aqui vou receber o restante que não foi componentezado. --}}
            </main>
        </div>
    </div>
</body>
</html>

