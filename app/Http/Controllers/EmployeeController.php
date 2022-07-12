<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;
use Session;

class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $employees = Employee::latest()->paginate(10);
        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        $companies = Company::all();
        return view('employees.create', compact('companies'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'firstname'=>'required|max:255',
            'lastname'=>'required|max:255',
            'company_id'=>'required|integer',
            'email' => 'max:255',
            'phone'=> 'max:255'
        ]);

        Employee::create($request->all());

        Session::flash('success', 'The company was successfully created.');
        return redirect()->route('employees.index')->with('success', 'Employee successfully created');
    }

    public function show(Employee $employee)
    {
        return view('employees.show', compact('employee'));
    }

    public function edit(Employee $employee)
    {
        $companies = Company::all();
        return view('employees.edit', compact(['employee', 'companies']));
    }

    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'firstname'=>'required|max:255',
            'lastname'=>'required|max:255',
            'company_id'=>'required|integer',
            'email' => 'max:255',
            'phone'=> 'max:255'
        ]);

        $employee->update($request->all());

        Session::flash('success', 'The employee was successfully updated.');
        return redirect()->route('employees.index')->with('success', 'Employee successfully updated');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();

        Session::flash('success', 'The company was successfully deleted.');
        return redirect()->route('employees.index')->with('Success', 'Employee successfully unregistered');
    }
}
