<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrderIngredient;

class OrderIngredientController extends Controller
{
    /**
     * Display all order-ingredient relationships.
     */
    public function index()
    {
        $items = OrderIngredient::with(['order', 'ingredient'])->get();
        return response()->json(['order_ingredients' => $items]);
    }

    /**
     * Store a new relation between order and ingredient.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'order_id' => 'required|exists:orders,id',
            'ingredient_id' => 'required|exists:ingredients,id',
        ]);

        $relation = OrderIngredient::create($validated);

        return response()->json(['order_ingredient' => $relation], 201);
    }

    /**
     * Show a single order-ingredient relationship.
     */
    public function show(string $id)
    {
        $relation = OrderIngredient::find($id);

        if (!$relation) {
            return response()->json(['message' => 'Relation not found'], 404);
        }

        return response()->json(['order_ingredient' => $relation]);
    }

    /**
     * Delete a relation.
     */
    public function destroy(string $id)
    {
        $relation = OrderIngredient::find($id);

        if (!$relation) {
            return response()->json(['message' => 'Relation not found'], 404);
        }

        $relation->delete();

        return response()->json(['message' => 'Deleted successfully', 'success' => true]);
    }
}
