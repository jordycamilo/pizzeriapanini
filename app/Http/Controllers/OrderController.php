<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Pizza;
use App\Models\PizzaSize;
use App\Models\Ingredient;
use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Requests\OrderRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;


class OrderController extends Controller
{
  
    public function index(Request $request): View
    {
        $orders = Order::with(['pizza', 'size', 'client', 'ingredients'])->get();
        return view('orders.index', compact('orders'));
    }

    
    public function create(): View
    {
        $pizzas = Pizza::all();
        $sizes = PizzaSize::all();
        $ingredients = Ingredient::all();

        return view('orders.create', compact('pizzas', 'sizes', 'ingredients'));
    }

    
    public function store(OrderRequest $request): RedirectResponse
    {
        $request->validate([
            'pizza_id' => 'required|exists:pizzas,id',
            'pizza_size_id' => 'required|exists:pizza_sizes,id',
            'order_type' => 'required|in:para_llevar,en_local',
        ]);

        $order = Order::create([
            'pizza_id' => $request->pizza_id,
            'pizza_size_id' => $request->pizza_size_id,
            'order_type' => $request->order_type,
            'client_id' => auth()->id() ?? 1, // usar auth o setear fijo si aún no hay login
        ]);

        if ($request->has('ingredients')) {
            $order->ingredients()->attach($request->ingredients);
        }

        return redirect()->route('orders.index')->with('success', 'Pedido creado con éxito.');
    }

    
    public function edit($id): View
    {
        $order = Order::findOrFail($id);
        $order->load('ingredients');
    
        $pizzas = Pizza::all();
        $sizes = PizzaSize::all();
        $ingredients = Ingredient::all();
    
        return view('orders.edit', compact('order', 'pizzas', 'sizes', 'ingredients'));
    }

    
    public function update(OrderRequest $request, Order $order): RedirectResponse
    {
        $request->validate([
            'pizza_id' => 'required|exists:pizzas,id',
            'pizza_size_id' => 'required|exists:pizza_sizes,id',
            'order_type' => 'required|in:para_llevar,en_local',
        ]);

        $order->update([
            'pizza_id' => $request->pizza_id,
            'pizza_size_id' => $request->pizza_size_id,
            'order_type' => $request->order_type,
        ]);

        // sincroniza ingredientes
        $order->ingredients()->sync($request->ingredients ?? []);

        return redirect()->route('orders.index')->with('success', 'Pedido actualizado.');
    }

    public function destroy($id): RedirectResponse
    {
        $order = Order::findOrFail($id);
    $order->delete();

    return redirect()->route('orders.index')->with('success', 'Pedido eliminado correctamente.');
    }
}
