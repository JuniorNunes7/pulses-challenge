<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/app.css">
    <title>Pulses Challenge</title>
</head>
<body>
    <div id="app" class="d-flex">
        <sidebar :menu="[
            { text: 'Perguntas', url: '/perguntas', active: false }, 
            { text: 'Dimensões', url: '/dimensoes', active: false }]"
        ></sidebar>

        @yield('content')

        <vue-toastr :session="{{ json_encode(session()->all()) }}"></vue-toastr>
    </div>

    <script src="/js/app.js"></script>
</body>
</html>