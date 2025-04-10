<thead>
    <tr>
        <th>ID</th>
        <th>Cliente</th>
        <th>Pizza</th>
        <th>Tamaño</th>
        <th>Tipo</th>
        <th>Ingredientes</th>
        <th>Acciones</th>
    </tr>
</thead>
<tbody>
@foreach($orders as $order)
    <tr>
        <td>{{ $order->id }}</td>
        <td>{{ $order->client?->user?->name ?? 'No asignado' }}</td>
        <td>{{ $order->pizza->name }}</td>
        <td>{{ $order->pizzaSize->size }}</td>
        <td>{{ $order->order_type }}</td>
        <td>
            @foreach($order->ingredients as $ingredient)
                <span class="badge bg-secondary">{{ $ingredient->name }}</span>
            @endforeach
        </td>
        <td>
            <a href="{{ route('orders.edit', $order) }}" class="btn btn-primary btn-sm">Editar</a>
            <form action="{{ route('orders.destroy', $order) }}" method="POST" style="display:inline;">
                @csrf @method('DELETE')
                <button class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro?')">Eliminar</button>
            </form>
        </td>
    </tr>
@endforeach
</tbody>
