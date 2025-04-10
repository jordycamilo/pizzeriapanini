@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Crear nuevo tamaño de pizza</h2>
    <form action="{{ route('pizza_sizes.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="pizza_id" class="form-label">Pizza</label>
            <select name="pizza_id" class="form-control" required>
                @foreach($pizzas as $pizza)
                    <option value="{{ $pizza->id }}">{{ $pizza->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="size" class="form-label">Tamaño</label>
            <select name="size" class="form-control" required>
                <option value="pequeña">Pequeña</option>
                <option value="mediana">Mediana</option>
                <option value="grande">Grande</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Precio</label>
            <input type="number" step="0.01" name="price" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('pizza_sizes.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
