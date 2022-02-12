{{--Busca Layout base--}}
@extends('templates.template')
{{--Insere na section content do layout base--}}
@section('content')
    <br>

    {{--Div simples apenas para detalhar os dados--}}

    <div class="col-8 m-auto">
        <main class="container">
            <div class="bg-light p-5 rounded text-center">
                <h1>Detalhamento de dados</h1>
                <p class="lead">
                    @php
                        $cidade=$posto->find($posto->id)->relCidades;
                    @endphp
                    <b>ID Posto:</b> {{$posto->id}}<br>
                    <b>Nível do Reservatório:</b> {{$posto->reservatorio}}%<br>
                    <b>Localização do Posto:</b> {{$posto->latitude}}, {{$posto->longitude}}<br>
                    <b>Cidade:</b> {{$cidade->nome_da_cidade}} <br>
                    <b>Localização da Cidade:</b> {{$cidade->latitude}}, {{$cidade->longitude}}<br>
                </p>
                <a class="btn btn-lg btn-primary" href="{{url("postos/")}}" role="button">Voltar</a>
            </div>
        </main>

    </div>
@endsection
