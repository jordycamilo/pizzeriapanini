<?php

namespace App\Http\Controllers\api;

use App\Models\Pizza;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PizzaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pizzas = Pizza::all();
        return response()->json(['pizzas' => $pizzas]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $pizza = Pizza::create($validated);

        return response()->json(['pizza' => $pizza], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pizza = Pizza::find($id);

        if (!$pizza) {
            return response()->json(['message' => 'Pizza not found'], 404);
        }

        return response()->json(['pizza' => $pizza]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pizza = Pizza::find($id);

        if (!$pizza) {
            return response()->json(['message' => 'Pizza not found'], 404);
        }

        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
        ]);

        $pizza->update($validated);

        return response()->json(['pizza' => $pizza]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pizza = Pizza::find($id);

        if (!$pizza) {
            return response()->json(['message' => 'Pizza not found'], 404);
        }

        $pizza->delete();

        return response()->json(['message' => 'Deleted successfully', 'success' => true]);
    }
}
