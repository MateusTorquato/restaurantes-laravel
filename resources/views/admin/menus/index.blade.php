@extends('layouts.app')

@section('content')
    <a href="{{ route('menu.new') }}" class="float-right btn btn-success">Novo</a>
    <h1 class="float-left">Menus</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>Restaurante</th>
                <th>Criado em</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($menus as $m )
                <tr>
                    <td>{{ $m->id }}</td>
                    <td>{{ $m->nome }}</td>
                    <td>
                        <a href="{{ route('restaurante.edit', ['restaurante' => $m->restaurante->id]) }}">
                            {{ $m->restaurante->nome }}
                        </a>    
                    </td>
                    <td>{{ $m->created_at }}</td>
                    <td>
                        <form action="{{ route('menu.destroy', ['id' => $m->id]) }}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <a href="{{ route('menu.edit', ['id' => $m->id]) }}" class="btn btn-primary">Editar</a>
                                <input type="submit" value="Excluir" class="btn btn-danger">
                            </div>     
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>    
@endsection