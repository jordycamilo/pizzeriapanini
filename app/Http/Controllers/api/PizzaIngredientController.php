<?php

namespace App\Http\Controllers\api;

use App\Models\PizzaIngredient;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PizzaIngredientController extends Controller
{
    public function index()
    {
        $pizza_ingredients = PizzaIngredient::all();
        return response()->json(['pizza_ingredients' => $pizza_ingredients]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'pizza_id' => 'required|exists:pizzas,id',
            'ingredient_id' => 'required|exists:ingredients,id',
        ]);

        $pizza_ingredient = PizzaIngredient::create($validated);

        return response()->json(['pizza_ingredient' => $pizza_ingredient], 201);
    }

    public function show(string $id)
    {
        $pizza_ingredient = PizzaIngredient::find($id);

        if (!$pizza_ingredient) {
            return response()->json(['message' => 'Pizza ingredient not found'], 404);
        }

        return response()->json(['pizza_ingredient' => $pizza_ingredient]);
    }

    public function update(Request $request, string $id)
    {
        $pizza_ingredient = PizzaIngredient::find($id);

        if (!$pizza_ingredient) {
            return response()->json(['message' => 'Pizza ingredient not found'], 404);
        }

        $validated = $request->validate([
            'pizza_id' => 'sometimes|required|exists:pizzas,id',
            'ingredient_id' => 'sometimes|required|exists:ingredients,id',
        ]);

        $pizza_ingredient->update($validated);

        return response()->json(['pizza_ingredient' => $pizza_ingredient]);
    }

    public function destroy(string $id)
    {
        $pizza_ingredient = PizzaIngredient::find($id);

        if (!$pizza_ingredient) {
            return response()->json(['message' => 'Pizza ingredient not found'], 404);
        }

        $pizza_ingredient->delete();

        return response()->json(['message' => 'Deleted successfully', 'success' => true]);
    }
}
