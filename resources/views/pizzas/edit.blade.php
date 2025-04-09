@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Editar Pizza</h2>
    <form method="POST" action="{{ route('pizzas.update', $pizza) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Nombre</label>
            <input type="text" name="name" class="form-control" value="{{ $pizza->name }}" required>
        </div>
        <div class="mb-3">
            <label>Descripción</label>
            <textarea name="description" class="form-control">{{ $pizza->description }}</textarea>
        </div>
        <div class="mb-3">
            <label>Precio</label>
            <input type="number" step="0.01" name="price" class="form-control" value="{{ $pizza->price }}" required>
        </div>
        <button class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection
