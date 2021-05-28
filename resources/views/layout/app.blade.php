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
    <div id="app" class="d-flex app-body">
        <sidebar :menu="[
            { text: 'Dimensões', url: '/dimensions', active: false },
            { text: 'Perguntas', url: '/questions', active: false }]"
        ></sidebar>

        <div class="container mt-3">
            @yield('content')
        </div>

        <vue-toastr :session="{{ json_encode(session()->all()) }}"></vue-toastr>
    </div>

    <script>window.csrfToken = '{{ csrf_token() }}';</script>
    <script src="/js/app.js"></script>
</body>
</html>