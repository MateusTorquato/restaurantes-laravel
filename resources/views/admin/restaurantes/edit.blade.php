<h1>Edição de Restaurantes</h1>
<hr>

<form action="{{ route('restaurante.update', ['restaurante' => $restaurante->id]) }}" method="POST">
    {{ csrf_field() }}
    <p>
        <label>Nome do restaurante</label>
        <input type="text" name="nome" value="{{ old('nome') != '' ? old('nome') : $restaurante->nome }}">
        @if($errors->has('nome'))
            {{ $errors->first('nome') }}
        @endif
    </p>
    <p>
        <label>Endereço</label>
        <input type="text" name="endereco" value="{{ old('endereco') != '' ? old('endereco') : $restaurante->endereco  }}">
        @if($errors->has('endereco'))
            {{ $errors->first('endereco') }}    
        @endif
    </p>
    <p>
        <label>Fale sobre o restaurante</label>
        <textarea name="descricao" id="" cols="30" rows="10"> {{ old('descricao') != '' ? old('descricao') : $restaurante->descricao }} </textarea>       
        @if($errors->has('descricao'))
            {{ $errors->first('descricao') }}
        @endif
    </p>
    <input type="submit" value="Atualizar">
</form>
