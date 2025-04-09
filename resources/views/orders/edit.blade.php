@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Editar pedido</h2>

    <form action="{{ route('orders.update', $order->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Pizza</label>
            <select class="form-control" name="pizza_id" required>
                @foreach($pizzas as $pizza)
                    <option value="{{ $pizza->id }}" @selected($pizza->id == $order->pizza_id)>{{ $pizza->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Tamaño</label>
            <select class="form-control" name="pizza_size_id" required>
                @foreach($sizes as $size)
                    <option value="{{ $size->id }}" @selected($size->id == $order->pizza_size_id)>{{ $size->size }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Tipo de pedido</label>
            <select class="form-control" name="order_type" required>
                <option value="para_llevar" @selected($order->order_type == 'para_llevar')>Para llevar</option>
                <option value="en_local" @selected($order->order_type == 'en_local')>En el local</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Ingredientes adicionales</label>
            @foreach($ingredients as $ingredient)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="ingredients[]" value="{{ $ingredient->id }}"
                    @checked(in_array($ingredient->id, $order->ingredients->pluck('id')->toArray()))>
                    <label class="form-check-label">{{ $ingredient->name }}</label>
                </div>
            @endforeach
        </div>

        <button type="submit" class="btn btn-primary">Actualizar pedido</button>
    </form>
</div>
@endsection

