@csrf()
<input type="text" placeholder="Nome" name="nome" value="{{ $operator->nome ?? old('operator') }}">

<button type="submit">Enviar</button>
