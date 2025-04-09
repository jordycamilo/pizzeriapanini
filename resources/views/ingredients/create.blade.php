@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Nuevo Ingrediente</h2>
    <form action="{{ route('ingredients.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nombre del ingrediente</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <button class="btn btn-primary">Guardar</button>
        <a href="{{ route('ingredients.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
