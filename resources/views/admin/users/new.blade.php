@extends('layouts.app')

@section('content')
    <h1>Inserção de Usuários</h1>
    <hr>
    <form action="{{ route('user.store') }}" method="post">
        {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
        {{-- $errors->all()--}}
        {{ csrf_field() }}
        <p class="form-group">
            <label>Nome do usuário</label>
            <input type="text" name="name" value="{{ old('name') }}" class="form-control @if($errors->has('name')) is-invalid @endif">
            <span class="invalid-feedback">
                @if($errors->has('name'))
                    <strong> {{ $errors->first('name') }} </strong>
                @endif
            </span>    
        </p>
        <p class="form-group">
            <label>Email</label>
            <input type="email" name="email" value="{{ old('email') }}" class="form-control @if($errors->has('email')) is-invalid @endif">
            <span class="invalid-feedback">
                @if($errors->has('email'))
                    <strong> {{ $errors->first('email') }} </strong>
                @endif
            </span>    
        </p>
        <p class="form-group">
            <label>Senha</label>
            <input type="password" name="password" value="{{ old('password') }}" class="form-control @if($errors->has('password')) is-invalid @endif">
            <span class="invalid-feedback">
                @if($errors->has('password'))
                    <strong> {{ $errors->first('password') }} </strong>
                @endif
            </span>    
        </p>
        <p class="form-group">
            <label>Confirmar senha</label>
            <input type="password" name="password_confirmation" value="{{ old('password_confirmation') }}" class="form-control @if($errors->has('password_confirmation')) is-invalid @endif">
            <span class="invalid-feedback">
                @if($errors->has('password_confirmation'))
                    <strong> {{ $errors->first('password_confirmation') }} </strong>
                @endif
            </span>    
        </p>
        <input type="submit" value="Cadastrar" class="btn btn-success btn-lg">
    </form>
@endsection