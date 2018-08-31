@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h2>{{ $restaurante->nome }}</h2>
            <hr>
            <p>{{ $restaurante->descricao }}</p>
            <p>
                <address>
                    Endereço: {{ $restaurante->endereco }}
                </address>
            </p>
        </div>
        <div class="col-12">
            Cardápio:
            <ul class="list-group">
                @foreach ($restaurante->menus as $m)
                    <li class="list-group-item">
                        {{ $m->nome }} <br>
                        R$ {{ number_format($m->preco, '2', ',', '.') }}
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="col-12">
            <h2>Fotos</h2>
            <hr>
        </div>
        <div class="row">
            @if($restaurante->fotos()->count())
                @foreach($restaurante->fotos as $foto)
                    <div class="col-4">
                        <img src="{{asset('/images/' . $foto->foto)}}" alt="" class="img-fluid">
                    </div>
                @endforeach
            @else
                <div class="col-12">
                    <span class="alert alert-warning">Sem Fotos para Este Restaurante...</span>
                </div>
            @endif
        </div>        
    </div>
</div>
@endsection
