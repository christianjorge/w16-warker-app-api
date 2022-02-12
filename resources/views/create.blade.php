{{--View utilizada tanto para create quanto para edit em alguns locais existem ifs para diferenciar as duas coisas--}}

{{--Busca Layout base--}}
@extends('templates.template')

{{--Insere na section content do layout base--}}
@section('content')
    {{--Titulo--}}
    <br>
    <h1 class="text-center">@if(isset($posto)) Editar Posto @else Novo Posto de Gasolina @endif</h1> <hr>
    {{--Div para exibir erros do back--}}
    @if(isset($errors) && count($errors)>=1)
        <div class="text-center mt-4 mb-4 p-2 alert-danger">
            @foreach($errors->all() as $err)
                {{$err}}<br>
            @endforeach
        </div>
    @endif
    {{--Div do formulário--}}
    <div class="col-8 m-auto">
        {{--Verifica se é cadastro ou edição--}}
        @if(isset($posto))
            {{--Aciona o padrão de insert porém passando o método put--}}
            <form name="formEdit" id="formEdit" method="post" action="{{url("postos/$posto->id")}}">
            @method('PUT')
        @else
            <form name="formCad" id="formCad" method="post" action="{{url('postos')}}">
        @endif
            {{--Autenticador--}}
            @csrf
            {{--Campos do formulário--}}
            Capacidade: <input class="form-control" type="number" min="0" max="100" name="reservatorio" id="reservatorio" placeholder="% de Reserva" value="{{$posto->reservatorio ?? ''}}" required><br>
            Latitude: <input class="form-control" type="number" step="0.000000000000000001" name="latitude" id="latitude" placeholder="Ex.: -19.879651485197325" value="{{$posto->latitude ?? ''}}" required><br>
            Longitude: <input class="form-control" type="number" step="0.000000000000000001" name="longitude" id="longitude" placeholder="Ex.: -44.60566015407107" value="{{$posto->longitude ?? ''}}" required><br>
            Cidade:
            <select class="form-control" name="cidades_id" id="cidades_id" required>
                <option value="{{$posto->relCidades->id ?? ''}}">{{$posto->relCidades->nome_da_cidade ?? 'Escolha uma cidade:'}}</option>
                @foreach($cidades as $cidade)
                    <option value="{{$cidade->id}}">{{$cidade->nome_da_cidade}}</option>
                @endforeach
            </select><br>
            {{--Submit comum do Form--}}
            <input class="btn btn-primary" type="submit" value="@if(isset($posto)) Editar @else Cadastrar @endif">
        </form>
    </div>
@endsection
