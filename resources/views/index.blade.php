{{--View principal do projeto, tabela com opções--}}
{{--Para layout rápido utilizei Bootstrap--}}

{{--Busca layout base--}}
@extends('templates.template')
{{--Insere na section content do layout base--}}
@section('content')
    <br>
    <h1 class="text-center">Warker Project</h1> <hr>

    <div class="text-center mt-3 mb-4">
        <a href="{{url("postos/create")}}">
            {{--  Botão para abrir cadastro de Postos --}}
            <button class="btn btn-success">Novos Postos</button>
        </a>
    </div>

    <div class="col-8 m-auto">
        @csrf
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
            {{-- Lista de Postos --}}
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
                        {{--Options que utilizam as rotas web.php--}}
                        <a href="{{url("postos/$postos->id")}}">
                            <button class="btn btn-dark">Visualizar</button>
                        </a>

                        <a href="{{url("postos/$postos->id/edit")}}">
                            <button class="btn btn-primary">Editar</button>
                        </a>

                        <input type="hidden" value="{{url("postos/$postos->id")}}" id="del{{$postos->id}}">

                        {{--Function confirmDel em public/assets/js--}}
                        <button class="btn btn-danger" onclick="confirmDel({{$postos->id}})">Deletar</button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{-- Paginação --}}
        <div id="paginate">
            {{$posto->links()}}
        </div>
    </div>
@endsection
