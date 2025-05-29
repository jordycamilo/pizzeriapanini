<?php

namespace App\Http\Controllers\api;

use App\Models\PizzaSize;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PizzaSizeController extends Controller
{
    public function index()
    {
        $pizza_sizes = PizzaSize::all();
        return response()->json(['pizza_sizes' => $pizza_sizes]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'pizza_id' => 'required|exists:pizzas,id',
            'size' => 'required|in:pequeña,mediana,grande',
            'price' => 'required|numeric',
        ]);

        $pizza_size = PizzaSize::create($validated);

        return response()->json(['pizza_size' => $pizza_size], 201);
    }

    public function show(string $id)
    {
        $pizza_size = PizzaSize::find($id);

        if (!$pizza_size) {
            return response()->json(['message' => 'Pizza size not found'], 404);
        }

        return response()->json(['pizza_size' => $pizza_size]);
    }

    public function update(Request $request, string $id)
    {
        $pizza_size = PizzaSize::find($id);

        if (!$pizza_size) {
            return response()->json(['message' => 'Pizza size not found'], 404);
        }

        $validated = $request->validate([
            'pizza_id' => 'sometimes|required|exists:pizzas,id',
            'size' => 'sometimes|required|in:pequeña,mediana,grande',
            'price' => 'sometimes|required|numeric',
        ]);

        $pizza_size->update($validated);

        return response()->json(['pizza_size' => $pizza_size]);
    }

    public function destroy(string $id)
    {
        $pizza_size = PizzaSize::find($id);

        if (!$pizza_size) {
            return response()->json(['message' => 'Pizza size not found'], 404);
        }

        $pizza_size->delete();

        return response()->json(['message' => 'Deleted successfully', 'success' => true]);
    }
}
