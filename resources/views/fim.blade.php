@extends('layouts.tamplate')

@section('conteudo')

<div class="container">

    <h2 class="text-center">Votação Encerrada</h2>

    <div class="container">
        <a class="btn btn-info" href="{{ route('index') }}">INICIO</a>
    </div>

    <br>
    <br>
    <table class="table">
        <h4 class="text-center">Votação para Presidente</h4>
        <thead class="thead-dark">
          <tr>
            <th scope="col"><i class="fas fa-award"></i></th>
            <th scope="col">Nome</th>
            <th scope="col">Partido</th>
            <th scope="col">Votos</th>
          </tr>
        </thead>
        <tbody>
            @php
                $posicao = 1;
            @endphp
            @forelse ($presidentes as $presidente)
            <tr>
                <th scope="row">{{$posicao++}}</th>
                <td>{{ $presidente->nome }}</td>
                <td>{{ $presidente->partido }}</td>
                <td>{{ $presidente->votos }}</td>
            </tr>
            @empty

            @endforelse
        </tbody>


    </table>

    <br>
    <br>
    <table class="table">
        <h4 class="text-center">Votação para Governador</h4>
        <thead class="thead-dark">
          <tr>
            <th scope="col"><i class="fas fa-award"></i></th>
            <th scope="col">Nome</th>
            <th scope="col">Partido</th>
            <th scope="col">Votos</th>
          </tr>
        </thead>
        <tbody>
            @php
                $posicao = 1;
            @endphp
            @forelse ($governadores as $governador)
            <tr>
                <th scope="row">{{$posicao++}}</th>
                <td>{{ $governador->nome }}</td>
                <td>{{ $governador->partido }}</td>
                <td>{{ $governador->votos }}</td>
            </tr>
            @empty

            @endforelse
        </tbody>


    </table>
    <br>
    <br>
    <table class="table">
        <h4 class="text-center">Votação para Prefeito</h4>
        <thead class="thead-dark">
          <tr>
            <th scope="col"><i class="fas fa-award"></i></th>
            <th scope="col">Nome</th>
            <th scope="col">Partido</th>
            <th scope="col">Votos</th>
          </tr>
        </thead>
        <tbody>
            @php
                $posicao = 1;
            @endphp
            @forelse ($prefeitos as $prefeito)
            <tr>
                <th scope="row">{{$posicao++}}</th>
                <td>{{ $prefeito->nome }}</td>
                <td>{{ $prefeito->partido }}</td>
                <td>{{ $prefeito->votos }}</td>
            </tr>
            @empty

            @endforelse
        </tbody>


    </table>

</div>

@endsection

