@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Crear Pizza</h2>
    <form method="POST" action="{{ route('pizzas.store') }}">
        @csrf
        <div class="mb-3">
            <label>Nombre</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Descripción</label>
            <textarea name="description" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <label>Precio</label>
            <input type="number" step="0.01" name="price" class="form-control" required>
        </div>
        <button class="btn btn-success">Guardar</button>
    </form>
</div>
@endsection
