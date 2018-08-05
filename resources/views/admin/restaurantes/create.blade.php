<h1>Inserção de Restaurantes</h1>
<hr>

<form action="{{ route('restaurante.store') }}" method="post">
    {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
    {{ csrf_field() }}
    <p>
        <label>Nome do restaurante</label>
        <input type="text" name="nome">
    </p>
    <p>
        <label>Endereço</label>
        <input type="text" name="endereco">
    </p>
    <p>
        <label>Fale sobre o restaurante</label>
        <textarea name="descricao" id="" cols="30" rows="10"> </textarea>       
    </p>
    <input type="submit" value="Cadastrar">
</form>
