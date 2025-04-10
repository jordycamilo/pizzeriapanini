@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Editar Cliente</h2>
    <form method="POST" action="{{ route('clients.update', $client) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Dirección</label>
            <input type="text" name="address" class="form-control" value="{{ $client->address }}" required>
        </div>
        <div class="mb-3">
            <label>Teléfono</label>
            <input type="text" name="phone" class="form-control" value="{{ $client->phone }}" required>
        </div>
        <div class="mb-3">
            <label>Usuario</label>
            <select name="user_id" class="form-control" required>
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ $client->user_id == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        <button class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection
