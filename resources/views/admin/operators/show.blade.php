<h1>Detalhes da dúvida {{ $operator->id }}</h1>

<ul>
    <li>Nome: {{ $operator->nome }}</li>

</ul>

<form action="{{ route('operators.destroy', $operator->id) }}" method="post">
    @csrf()
    @method('DELETE')
    <button type="submit">Deletar</button>
</form>
