@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Crear nuevo pedido</h2>

    <form action="{{ route('orders.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="pizza_id" class="form-label">Pizza</label>
            <select class="form-control" name="pizza_id" required>
                @foreach($pizzas as $pizza)
                    <option value="{{ $pizza->id }}">{{ $pizza->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="pizza_size_id" class="form-label">Tamaño</label>
            <select class="form-control" name="pizza_size_id" required>
                @foreach($sizes as $size)
                    <option value="{{ $size->id }}">{{ $size->size }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="order_type" class="form-label">Tipo de pedido</label>
            <select name="order_type" class="form-control" required>
                <option value="para_llevar">Para llevar</option>
                <option value="en_local">En el local</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Ingredientes adicionales</label>
            @foreach($ingredients as $ingredient)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="ingredients[]" value="{{ $ingredient->id }}">
                    <label class="form-check-label">{{ $ingredient->name }}</label>
                </div>
            @endforeach
        </div>

        <button type="submit" class="btn btn-success">Guardar pedido</button>
    </form>
</div>
@endsection
