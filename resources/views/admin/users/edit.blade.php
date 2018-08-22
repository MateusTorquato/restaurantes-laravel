@extends('layouts.app')

@section('content')
    <h1>Edição de Usuários</h1>
    <hr>
    <form action="{{ route('user.update', ['user' => $user->id]) }}" method="POST">
        {{ csrf_field() }}
        <p class="form-group">
            <label>Nome do usuário</label>
            <input type="text" name="name" value="{{ old('name') != '' ? old('name') : $user->name }}" class="form-control @if($errors->has('name')) is-invalid @endif">
            <span class="invalid-feedback">
                @if($errors->has('name'))
                    <strong> {{ $errors->first('name') }} </strong>
                @endif
            </span>    
        </p>
        <p class="form-group">
            <label>Email</label>
            <input type="email" name="email" value="{{ old('email') != '' ? old('email') : $user->email  }}" class="form-control @if($errors->has('email')) is-invalid @endif">
            <span class="invalid-feedback">
                @if($errors->has('email'))
                    <strong> {{ $errors->first('email') }} </strong>
                @endif
            </span>    
        </p>
        <p class="form-group">
            <label>Senha</label>
            <input type="password" name="password" value="{{ old('password') != '' ? old('password') : $user->password  }}" class="form-control @if($errors->has('password')) is-invalid @endif">
            <span class="invalid-feedback">
                @if($errors->has('password'))
                    <strong> {{ $errors->first('password') }} </strong>
                @endif
            </span>    
        </p>
        <p class="form-group">
            <label>Senha</label>
            <input type="password" name="password_confirmation" value="{{ old('password_confirmation') != '' ? old('password_confirmation') : $user->password_confirmation  }}" class="form-control @if($errors->has('password_confirmation')) is-invalid @endif">
            <span class="invalid-feedback">
                @if($errors->has('password_confirmation'))
                    <strong> {{ $errors->first('password_confirmation') }} </strong>
                @endif
            </span>    
        </p>
        <input type="submit" value="Atualizar" class="btn btn-success btn-lg">
    </form>
@endsection