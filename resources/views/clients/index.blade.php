@extends('layouts.app')

<<<<<<< HEAD
@section('template_title')
    Clientes
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Clientes') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('clients.create') }}" class="btn btn-primary btn-sm float-right"
                                    data-placement="left">
                                    {{ __('Nuevo Cliente') }}
                                </a>
                            </div>
                        </div>
                    </div>

                    @if (session('success'))
                        <div class="alert alert-success m-4">
                            <p>{{ session('success') }}</p>
                        </div>
                    @endif

                    <div class="card-body bg-white">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        <th>Dirección</th>
                                        <th>Teléfono</th>
                                        <th>Usuario</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($clients as $index => $client)
                                        <tr>
                                            <td>{{ ($clients->currentPage() - 1) * $clients->perPage() + $index + 1 }}</td>
                                            <td>{{ $client->address }}</td>
                                            <td>{{ $client->phone }}</td>
                                            <td>{{ $client->user->name ?? 'Sin usuario' }}</td>
                                            <td>
                                                <form action="{{ route('clients.destroy', $client) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary"
                                                        href="{{ route('clients.show', $client) }}"><i
                                                            class="fa fa-fw fa-eye"></i> {{ __('Ver') }}</a>
                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('clients.edit', $client) }}"><i
                                                            class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        onclick="event.preventDefault(); confirm('¿Seguro que quieres eliminar este cliente?') ? this.closest('form').submit() : false;"><i
                                                            class="fa fa-fw fa-trash"></i> {{ __('Eliminar') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $clients->withQueryString()->links() !!}
            </div>
        </div>
    </div>
=======
@section('content')
<div class="container">
    <h2>Lista de Clientes</h2>
    <a href="{{ route('clients.create') }}" class="btn btn-success mb-3">Nuevo Cliente</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Dirección</th>
                <th>Teléfono</th>
                <th>Usuario</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($clients as $client)
                <tr>
                    <td>{{ $client->address }}</td>
                    <td>{{ $client->phone }}</td>
                    <td>{{ $client->user->name ?? 'Sin usuario' }}</td>
                    <td>
                        <a href="{{ route('clients.edit', $client) }}" class="btn btn-primary btn-sm">Editar</a>
                        <form action="{{ route('clients.destroy', $client) }}" method="POST" class="d-inline-block" onsubmit="return confirm('¿Seguro que quieres eliminar este cliente?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
>>>>>>> 0396c0cfe425a28e93d2a6e453eac07214264007
@endsection
