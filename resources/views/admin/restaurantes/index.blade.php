@extends('layouts.app')

@section('content')
    <a href="{{ route('restaurante.new') }}" class="float-right btn btn-success">Novo</a>
    <h1 class="float-left">Restaurantes</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>Criado em</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($restaurantes as $r )
                <tr>
                    <td>{{ $r->id }}</td>
                    <td>{{ $r->nome }}</td>
                    <td>{{ $r->created_at }}</td>
                    <td>
                        <form action="{{ route('restaurante.destroy', ['id' => $r->id]) }}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <a href="{{ route('restaurante.edit', ['id' => $r->id]) }}" class="btn btn-primary">Editar</a>
                                <a href="{{ route('restaurante.foto', ['id' => $r->id]) }}" class="btn btn-warning">Fotos</a>
                                <input type="submit" value="Excluir" class="btn btn-danger">
                            </div>     
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>    
@endsection