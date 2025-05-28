<?php

namespace App\Http\Controllers\api;
use Illuminate\Support\Facades\DB;
use App\Models\Employee; // Necesario para usar el modelo Employee
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employee = DB::table('employees') 
            ->join('users', 'employees.user_id', '=', 'users.id')
            ->select('employees.*', 'users.id')    
            ->get();

        return response()->json(['employees' => $employee]);
    }

    public function store(Request $request)
    {
        $employee = new Employee();
        $employee->user_id = $request->user_id;
        $employee->position = $request->position;   
        $employee->identification_number = $request->identification_number;
        $employee->salary = $request->salary;
        $employee->hire_date = $request->hire_date;
        $employee->save();

        return json_encode(['employees' => $employee]); 
    }

    public function show(string $id)
    {
        $employee = Employee::find($id); 

        $users = DB::table('users')
            ->orderBy('user_id')
            ->get();

        return json_encode(['employees' => $employee, 'users' => $users]);
    }

    public function update(Request $request, string $id)
    {
        $employee = Employee::find($id); 
        $employee->employee_id = $request->employee_id;
        $employee->user_id = $request->user_id;
        $employee->save();

        return json_encode(['employees' => $employee]);
    }

    public function destroy(string $id)
    {
        $employee = Employee::find($id);
        $employee->delete();

        $employees = DB::table('employees') 
            ->join('users', 'employees.user_id', '=', 'users.id')
            ->select('employees.*', 'users.name as user_name')    
            ->get();

        return json_encode(['employees' => $employees, 'success' => true]); 
    }
}
