<h1>Listagem dos Operadoras</h1>

<a href="{{ route('operators.create') }}">Criar Dúvida Operadora</a>

<table>
    <thead>
        <th>assunto</th>
        <th></th>
    </thead>
    <tbody>
        @foreach($operators->items() as $operator)
            <tr>
                <td>{{ $operator->nome }}</td>
                <td>
                    <a href="{{ route('operators.show', $operator->id) }}">ir</a>
                    <a href="{{ route('operators.edit', $operator->id) }}">Editar</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<x-pagination
    :paginator="$operators"
    :appends="$filters" />
