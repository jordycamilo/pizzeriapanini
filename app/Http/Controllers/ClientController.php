<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\User;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
<<<<<<< HEAD
        $clients = Client::with('user')->paginate(10);
=======
        $clients = Client::with('user')->get();
>>>>>>> 0396c0cfe425a28e93d2a6e453eac07214264007
        return view('clients.index', compact('clients'));
    }

    public function create()
    {
        $users = User::all();
        return view('clients.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'address' => 'required|string',
            'phone' => 'required|string',
            'user_id' => 'required|exists:users,id',
        ]);

        Client::create($request->all());

        return redirect()->route('clients.index')->with('success', 'Cliente creado.');
    }

    public function edit(Client $client)
    {
        $users = User::all();
        return view('clients.edit', compact('client', 'users'));
    }

    public function update(Request $request, Client $client)
    {
        $request->validate([
            'address' => 'required|string',
            'phone' => 'required|string',
            'user_id' => 'required|exists:users,id',
        ]);

        $client->update($request->all());

        return redirect()->route('clients.index')->with('success', 'Cliente actualizado.');
    }
<<<<<<< HEAD
    public function show($id): \Illuminate\Contracts\View\View
    {
        $client = client::find($id);

        return view('clients.show', compact('client'));
    }
=======
>>>>>>> 0396c0cfe425a28e93d2a6e453eac07214264007

    public function destroy(Client $client)
    {
        $client->delete();

        return redirect()->route('clients.index')->with('success', 'Cliente eliminado.');
    }
}
