@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Nuevo Cliente</h2>
    <form method="POST" action="{{ route('clients.store') }}">
        @csrf
        <div class="mb-3">
            <label>Dirección</label>
            <input type="text" name="address" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Teléfono</label>
            <input type="text" name="phone" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Usuario</label>
            <select name="user_id" class="form-control" required>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        <button class="btn btn-success">Guardar</button>
    </form>
</div>
@endsection
    