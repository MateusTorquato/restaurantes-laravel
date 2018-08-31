@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Restaurantes</h1>
    <div class="row">
        @foreach ($restaurantes as $r)
            <div class="col-4">
                <h2>{{ $r->nome }}</h2>
                <p>
                    {{ $r->descricao }}
                </p>
            </div>
        @endforeach
    </div>
    {{ $restaurantes->links() }}
</div>
@endsection
