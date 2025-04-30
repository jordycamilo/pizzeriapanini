@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Editar tamaño de pizza</h2>
    <form action="{{ route('pizza_sizes.update', $pizzaSize) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="pizza_id" class="form-label">Pizza</label>
            <select name="pizza_id" class="form-control" required>
                @foreach($pizzas as $pizza)
                    <option value="{{ $pizza->id }}" {{ $pizzaSize->pizza_id == $pizza->id ? 'selected' : '' }}>
                        {{ $pizza->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="size" class="form-label">Tamaño</label>
            <select name="size" class="form-control" required>
                @foreach(['pequeña', 'mediana', 'grande'] as $size)
                    <option value="{{ $size }}" {{ $pizzaSize->size == $size ? 'selected' : '' }}>
                        {{ ucfirst($size) }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Precio</label>
            <input type="number" step="0.01" name="price" class="form-control" value="{{ $pizzaSize->price }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('pizza_sizes.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
