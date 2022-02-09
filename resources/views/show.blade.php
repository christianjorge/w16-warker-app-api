@extends('templates.template')

@section('content')
    <h1 class="text-center">Visualizar</h1> <hr>

    <div class="col-8 m-auto">
        @php
            $cidade=$posto->find($posto->id)->relCidades;
        @endphp
        ID Posto: {{$posto->id}}<br>
        Nível do Reservatório: {{$posto->reservatorio}}%<br>
        Localização do Posto: {{$posto->latitude}}, {{$posto->longitude}}<br>
        Cidade: {{$cidade->nome_da_cidade}} <br>
        Localização da Cidade: {{$cidade->latitude}}, {{$cidade->longitude}}<br>
    </div>
@endsection
