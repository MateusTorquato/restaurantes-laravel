<h1>Edição de Restaurantes</h1>
<hr>

<form action="{{ route('restaurante.update', ['restaurante' => $restaurante->id]) }}" method="POST">
    {{ csrf_field() }}
    <p>
        <label>Nome do restaurante</label>
        <input type="text" name="nome" value="{{ $restaurante->nome }}">
    </p>
    <p>
        <label>Endereço</label>
        <input type="text" name="endereco" value="{{ $restaurante->endereco }}">
    </p>
    <p>
        <label>Fale sobre o restaurante</label>
        <textarea name="descricao" id="" cols="30" rows="10"> {{ $restaurante->descricao }} </textarea>       
    </p>
    <input type="submit" value="Atualizar">
</form>
