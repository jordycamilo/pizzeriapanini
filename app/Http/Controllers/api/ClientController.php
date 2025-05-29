<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = DB::table('clients')
            ->join('users', 'clients.user_id', '=', 'users.id')
            ->select('clients.*', 'users.id')    
            ->get();
        //return json_encode(['clients' => $clients]);
        return response()->json(['clients' => $clients]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $client = new Client();
        $client->user_id = $request->user_id;
        $client->address = $request->address;   
        $client->phone = $request->phone;
        $client->save();
        return json_encode(['clients'=> $client]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $client= Client::find($id);
        $users = DB::table('users')
            ->orderBy('user_id')
            ->get();
            
            return json_encode(['clients'=> $client, 'users' => $users]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $client = Client::find($id);
       $client->client_id = $request->client_id;
       $client->user_id = $request->user_id;
       $client->save();
       return json_encode(['clients'=> $client]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $client = Client::find($id);
        $client->delete();
        $clients= DB ::table('clients')
            ->join('users', 'clients.user_id', '=', 'users.id')
            ->select('clients.*', 'users.name as user_name')    
            ->get();
            return json_encode(['clients' => $clients, 'success' => true]); 
    }
}
