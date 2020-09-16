<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employees;
use Illuminate\Support\Facades\DB;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // we fetch all employees with the company associated
        // and paginate 5 results per page
        $employees = Employees::with('companies')->paginate(5);
        return view('employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // we fetch unique companies and inject that data to the dropdown menu
        $companies = DB::table('companies')->select('id','name')->groupBy('name')->get();
        return view('employees.create',compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->companies_id);
        $validateEmployeeData = $request->validate([
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'email' => 'string|email',
            'phone' => 'numeric',
            'companies_id' => 'required'
        ]);
        Employees::create($validateEmployeeData);
        return redirect('employees');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = Employees::find($id);
        return view('employees.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employees::find($id);
        $companies = DB::table('companies')->select('id','name')->groupBy('name')->get();
        return view('employees.edit', compact('employee', 'companies', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'email' => 'string|email',
            'phone' => 'numeric',
            'companies_id' => 'required'
        ]);


        $employee = Employees::find($id);
        $employee->first_name = $request->get('firstname');
        $employee->last_name = $request->get('lastname');
        $employee->email = $request->get('email');
        $employee->phone = $request->get('phone');
        $employee->companies_id = $request->get('companies_id');
        $employee->save();

        return redirect('employees')->with('success', 'Employee Added');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employees::findOrFail($id);
        $employee->delete();
        return redirect('employees');

    }

    public function isSelection($id)
    {
        $company = \App\Companies::find($id);
        return $company->id == $this->Employees()->companies_id ? 'selected' : '';
    }
}
