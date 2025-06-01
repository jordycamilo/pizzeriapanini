<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sucursale;
use Illuminate\Support\Facades\DB;

class SucursaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /*$sucursales = Sucursale::with('user')->get();
        return response()->json(['sucursales' => $sucursales]);*/

        $sucursales = DB::table('sucursales')
            ->join('users', 'sucursales.user_id', '=', 'users.id')
            ->select('sucursales.*', "users.name")
            ->get();
        //return json_encode(['sucursales'=>$sucursales]);
        return response()->json(['sucursales' => $sucursales]);
    }


    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $sucursale = new Sucursale();
        $sucursale->nombre = $request->nombre;
        $sucursale->direccion = $request->direccion;
        $sucursale->telefono = $request->telefono;
        $sucursale->user_id = $request->user_id;
        $sucursale->save();

        return json_encode(['sucursale' => $sucursale]);        //$sucursale = Sucursale::create($request->validated());
        //return response()->json(['sucursale' => $sucursale], 201);
        //return redirect()->route('sucursales.index')->with('success', 'Sucursal creada correctamente');
    }

    /**
     * Display the specified resource.
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        /*$sucursale = Sucursale::with('user')->find($id);
        if (!$sucursale) {
        return response()->json(['message' => 'Sucursal no encontrada'], 404);
    }
    
        $users = DB::table('users')
            ->orderBy('name')
            ->get();
        return json_encode(['sucursale' => $sucursale, 'users' => $users]);*/

        $sucursale = Sucursale::find($id);
        $users = DB::table('users')
            ->orderBy('name')
            ->get();
        return response()->json(['sucursale' => $sucursale, 'users' => $users]);
    }

    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $sucursale = Sucursale::find($id);
        $sucursale->nombre = $request->nombre;
        $sucursale->direccion = $request->direccion;
        $sucursale->telefono = $request->telefono;
        $sucursale->user_id = $request->user_id;
        $sucursale->save();

        return response()->json(['sucursale' => $sucursale]);
    }


    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(string $id)
    {
        $sucursale = Sucursale::find($id);
        $sucursale->delete();
        $sucursales = DB::table('sucursales')
            ->join('users', 'sucursales.user_id', '=', 'users.id')
            ->select('sucursales.*', "users.name as user_name")
            ->get();
        return response()->json(['sucursales' => $sucursales, 'success' => true]); //lo muestra lineal

    }
}
