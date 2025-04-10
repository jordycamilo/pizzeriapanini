@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Editar Usuario</h2>
    <form action="{{ route('users.update', $user) }}" method="POST">
        @csrf
        @method('PUT')
        @include('users.partials.form')
        <button class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection
