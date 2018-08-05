<table>
    <thread>
        <tr>
            <th>#</th>
            <th>Nome</th>
            <th>Criado em</th>
            <th>Ações</th>
        </tr>
    </thread>
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
                            <a href="{{ route('restaurante.edit', ['id' => $r->id]) }}">Editar</a>
                            <input type="submit" value="delete">
                        </div>     
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>