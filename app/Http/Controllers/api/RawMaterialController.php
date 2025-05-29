<?php

namespace App\Http\Controllers\api;

use App\Models\RawMaterial;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RawMaterialController extends Controller
{
    /**
     * Mostrar todos los raw materials
     */
    public function index()
    {
        $rawMaterials = RawMaterial::all();
        return response()->json(['raw_materials' => $rawMaterials]);
    }

    /**
     * Crear un nuevo raw material
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'unit' => 'required|string|max:50',
            'current_stock' => 'required|numeric',
        ]);

        $rawMaterial = RawMaterial::create($validated);

        return response()->json(['raw_material' => $rawMaterial], 201);
    }

    /**
     * Mostrar un raw material específico
     */
    public function show($id)
    {
        $rawMaterial = RawMaterial::find($id);
        if (!$rawMaterial) {
            return response()->json(['message' => 'Raw material not found'], 404);
        }
        return response()->json(['raw_material' => $rawMaterial]);
    }

    /**
     * Actualizar un raw material específico
     */
    public function update(Request $request, $id)
    {
        $rawMaterial = RawMaterial::find($id);
        if (!$rawMaterial) {
            return response()->json(['message' => 'Raw material not found'], 404);
        }

        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'unit' => 'sometimes|required|string|max:50',
            'current_stock' => 'sometimes|required|numeric',
        ]);

        $rawMaterial->update($validated);

        return response()->json(['raw_material' => $rawMaterial]);
    }

    /**
     * Eliminar un raw material específico
     */
    public function destroy($id)
    {
        $rawMaterial = RawMaterial::find($id);
        if (!$rawMaterial) {
            return response()->json(['message' => 'Raw material not found'], 404);
        }

        $rawMaterial->delete();

        return response()->json(['message' => 'Raw material deleted successfully', 'success' => true]);
    }
}
