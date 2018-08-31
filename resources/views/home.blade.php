@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Restaurantes</h1>
    <hr>
    <div class="row">
        @foreach ($restaurantes as $r)
            <div class="col-4">
                @if($r->fotos()->count())
                    <img src="{{asset('/images/' . $r->fotos()->first()->foto)}}" alt="" class="img-fluid">
                @endif
                <h2>
                    <a href="{{ route('home.single', ['id' => $r->id]) }}">{{ $r->nome }}</a>
                </h2>
                <p>
                    {{ str_limit($r->descricao, 150)}}
                </p>
            </div>
        @endforeach
    </div>
    {{ $restaurantes->links() }}
</div>
@endsection
