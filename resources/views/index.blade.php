@extends('templates.template')

@section('content')
    <h1 class="text-center">Warker Project</h1> <hr>

    <div class="text-center mt-3 mb-4">
        <a href="">
            <button class="btn btn-success">Cadastrar</button>
        </a>
    </div>

    <div class="col-8 m-auto">
        <table class="table text-center">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Cidade</th>
                <th scope="col">Reservatório</th>
                <th scope="col">Latitude</th>
                <th scope="col">Longitude</th>
                <th scope="col">Opções</th>
            </tr>
            </thead>
            <tbody>

            @foreach($posto as $postos)
                @php
                   $cidade = $postos->find($postos->id)->relCidades;
                @endphp
                <tr>
                    <th scope="row">{{$postos->id}}</th>
                    <td>{{$cidade->nome_da_cidade}}</td>
                    <td>{{$postos->reservatorio}}</td>
                    <td>{{$postos->latitude}}</td>
                    <td>{{$postos->longitude}}</td>
                    <td>
                        <a href="{{url("postos/$postos->id")}}">
                            <button class="btn btn-dark">Visualizar</button>
                        </a>

                        <a href="">
                            <button class="btn btn-primary">Editar</button>
                        </a>

                        <a href="">
                            <button class="btn btn-danger">Deletar</button>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
