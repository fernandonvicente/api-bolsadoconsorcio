<h1>Dúvida {{ $operator->id }}</h1>

<x-alert/>

<form action="{{ route('operators.update', $operator->id) }}" method="POST">
    @method('PUT')
    @include('admin.operators.partials.form', [
        'operator' => $operator
    ])
</form>
