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
    </div>
</div>
@endsection
