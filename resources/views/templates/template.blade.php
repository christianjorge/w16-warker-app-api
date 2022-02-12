{{--Layout base da parte visual do projeto--}}
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{url('assets/bootstrap/css/bootstrap.css')}}">
    <script src="{{url("assets/js/javascript.js")}}"></script>
    <title>Warker Project</title>
</head>
<body>
<style>
    #paginate{
        text-align: center;
    }
    #paginate svg{
        width: 15px!important;
        height: 15px!important;
    }
    #paginate > nav > div.flex.justify-between.flex-1.sm\:hidden{
        display: none;
    }
    #paginate p {
        display: none;
    }
</style>
    {{--Aqui entrará o conteúdo--}}
    @yield('content')
</body>
</html>
