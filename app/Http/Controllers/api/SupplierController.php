<?php

namespace App\Http\Controllers\api;

use App\Models\Supplier;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Mostrar todos los suppliers
     */
    public function index()
    {
        $suppliers = Supplier::all();
        return response()->json(['suppliers' => $suppliers]);
    }

    /**
     * Crear un nuevo supplier
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'contact_info' => 'nullable|string|max:255',
        ]);

        $supplier = Supplier::create($validated);

        return response()->json(['supplier' => $supplier], 201);
    }

    /**
     * Mostrar un supplier específico
     */
    public function show($id)
    {
        $supplier = Supplier::find($id);
        if (!$supplier) {
            return response()->json(['message' => 'Supplier not found'], 404);
        }
        return response()->json(['supplier' => $supplier]);
    }

    /**
     * Actualizar un supplier específico
     */
    public function update(Request $request, $id)
    {
        $supplier = Supplier::find($id);
        if (!$supplier) {
            return response()->json(['message' => 'Supplier not found'], 404);
        }

        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'contact_info' => 'nullable|string|max:255',
        ]);

        $supplier->update($validated);

        return response()->json(['supplier' => $supplier]);
    }

    /**
     * Eliminar un supplier específico
     */
    public function destroy($id)
    {
        $supplier = Supplier::find($id);
        if (!$supplier) {
            return response()->json(['message' => 'Supplier not found'], 404);
        }

        $supplier->delete();

        return response()->json(['message' => 'Supplier deleted successfully', 'success' => true]);
    }
}
