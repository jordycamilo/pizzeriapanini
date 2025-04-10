@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Crear Usuario</h2>
    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        @include('users.partials.form')
        <button class="btn btn-success">Guardar</button>
    </form>
</div>
@endsection
