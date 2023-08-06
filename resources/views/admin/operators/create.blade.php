<h1>Nova Dúvida</h1>

<x-alert/>

<form action="{{ route('operators.store') }}" method="POST">
    @include('admin.operators.partials.form')
</form>
