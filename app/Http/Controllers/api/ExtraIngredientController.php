<?php

namespace App\Http\Controllers\api;

use App\Models\ExtraIngredient;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExtraIngredientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Usamos Eloquent para traer todos
        $extra_ingredients = ExtraIngredient::all();

        return response()->json(['extra_ingredients' => $extra_ingredients]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validamos datos (opcional, pero recomendado)
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
        ]);

        // Creamos con Eloquent usando mass assignment
        $extra_ingredient = ExtraIngredient::create($validated);

        return response()->json(['extra_ingredient' => $extra_ingredient], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $extra_ingredient = ExtraIngredient::find($id);

        if (!$extra_ingredient) {
            return response()->json(['message' => 'Extra ingredient not found'], 404);
        }

        return response()->json(['extra_ingredient' => $extra_ingredient]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $extra_ingredient = ExtraIngredient::find($id);

        if (!$extra_ingredient) {
            return response()->json(['message' => 'Extra ingredient not found'], 404);
        }

        // Validamos datos
        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'price' => 'sometimes|required|numeric',
        ]);

        $extra_ingredient->update($validated);

        return response()->json(['extra_ingredient' => $extra_ingredient]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $extra_ingredient = ExtraIngredient::find($id);

        if (!$extra_ingredient) {
            return response()->json(['message' => 'Extra ingredient not found'], 404);
        }

        $extra_ingredient->delete();

        return response()->json(['message' => 'Deleted successfully', 'success' => true]);
    }
}
