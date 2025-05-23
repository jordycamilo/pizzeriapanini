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
        $sucursales = Sucursale::paginate();
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
        if ($request->has('usuario_id')) {
            $sucursale->usuario_id = $request->usuario_id;
        }

        $sucursale->save();

        return response()->json(['sucursale' => $sucursale], 201);
        // $sucursale = Sucursale::create($request->validated());
        return json_encode(['sucursale' => $sucursale]);

    }

    /**
     * Display the specified resource.
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        $sucursale = Sucursale::find($id);
        return json_encode(['sucursale' => $sucursale]);
        //return view('sucursale.show', compact('sucursale'));

    }

    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(SucursaleRequest $request, Sucursale $sucursale)
    {
        $sucursale->update($request->validated());
        return json_encode(['sucursale' => $sucursale]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Sucursale::find($id)->delete();
        $sucursales = DB::table('sucursales')->get();
        return json_encode(['sucursales' => $sucursales]);

    }
}
