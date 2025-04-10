@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Editar Ingrediente</h2>
    <form action="{{ route('ingredients.update', $ingredient) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" name="name" class="form-control" value="{{ $ingredient->name }}" required>
        </div>
        <button class="btn btn-primary">Actualizar</button>
        <a href="{{ route('ingredients.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
