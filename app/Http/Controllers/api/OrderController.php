<?php

namespace App\Http\Controllers\api;

use App\Models\Order;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::with(['client', 'branch', 'deliveryPerson', 'pizzas', 'ingredients', 'extraIngredients'])->get();
        return response()->json(['orders' => $orders]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'client_id' => 'required|exists:clients,id',
            'branch_id' => 'required|exists:branches,id',
            'delivery_person_id' => 'nullable|exists:employees,id',
            'total_price' => 'required|numeric',
            'status' => 'required|in:pendiente,en_preparacion,listo,entregado',
            'delivery_type' => 'required|in:en_local,a_domicilio',
        ]);

        $order = Order::create($validated);

        return response()->json(['order' => $order], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $order = Order::with(['client', 'branch', 'deliveryPerson', 'pizzas', 'ingredients', 'extraIngredients'])->find($id);

        if (!$order) {
            return response()->json(['message' => 'Order not found'], 404);
        }

        return response()->json(['order' => $order]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $order = Order::find($id);

        if (!$order) {
            return response()->json(['message' => 'Order not found'], 404);
        }

        $validated = $request->validate([
            'client_id' => 'sometimes|required|exists:clients,id',
            'branch_id' => 'sometimes|required|exists:branches,id',
            'delivery_person_id' => 'nullable|exists:employees,id',
            'total_price' => 'sometimes|required|numeric',
            'status' => 'sometimes|required|in:pendiente,en_preparacion,listo,entregado',
            'delivery_type' => 'sometimes|required|in:en_local,a_domicilio',
        ]);

        $order->update($validated);

        return response()->json(['order' => $order]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $order = Order::find($id);

        if (!$order) {
            return response()->json(['message' => 'Order not found'], 404);
        }

        $order->delete();

        return response()->json(['message' => 'Deleted successfully', 'success' => true]);
    }
}
