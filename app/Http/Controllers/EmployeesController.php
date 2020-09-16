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
        $validateEmployeeData = $request->validate([
            'first_name' => 'required|string|max:25',
            'last_name' => 'required|string|max:32',
            'email' => 'string|email|unique:user',
            'phone' => 'numeric|min:8|max:12',
            'companies_id' => 'required'
        ]);
dd($validateEmployeeData);
        return response()->json('Form successfully validated and saved');
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
        $employee = Employees::find($id);
        $validateEmployeeData = $request->validate([
            'first_name' => 'required|string|max:25',
            'last_name' => 'required|string|max:32',
            'email' => 'string|email|unique:user',
            'phone' => 'numeric|min:8|max:12',
            'companies_id' => 'required'
        ]);

        return response('bravo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
