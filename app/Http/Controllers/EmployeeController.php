<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    // Lista todos los empleados
    public function index()
    {
        return Employee::with('user')->get();
    }

    // Crea un nuevo empleado
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'position' => 'required|in:cajero,administrador,cocinero,mensajero',
            'identification_number' => 'required|string|max:20',
            'salary' => 'required|numeric|between:0,999999.99',
            'hire_date' => 'required|date',
        ]);

        $employee = Employee::create($validated);
        return response()->json($employee, 201);
    }

    // Muestra un empleado específico
    public function show($id)
    {
        return Employee::with('user')->findOrFail($id);
    }

    // Actualiza un empleado
    public function update(Request $request, $id)
    {
        $employee = Employee::findOrFail($id);

        $validated = $request->validate([
            'position' => 'in:cajero,administrador,cocinero,mensajero',
            'identification_number' => 'string|max:20',
            'salary' => 'numeric|between:0,999999.99',
            'hire_date' => 'date',
        ]);

        $employee->update($validated);
        return response()->json($employee);
    }

    // Elimina un empleado
    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();

        return response()->json(['message' => 'Empleado eliminado']);
    }
}
