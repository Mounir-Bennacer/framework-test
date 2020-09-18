<?php

namespace App\Http\Controllers;

use App\Companies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Session\Session;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Companies::paginate(5);
        return view('companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // here we validate the name, email, logo and website
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email',
            'logo' => 'mimes:svg,jpeg,jpg,png|max:2048',
            'website' => 'required'
        ]);

        $logo = $request->file('logoUpload');

        $url = $logo->store('public/logo');

        $company = new Companies;
        $company->name = $request->input('name');
        $company->email = $request->input('email');
        $company->logo = $url;
        $company->website = $request->input('website');

        $company->save();

        return redirect('companies')->with('success','Company added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $company = Companies::findOrFail($id);
        return view('companies.show',compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Companies::findOrFail($id);
        return view('companies.edit',compact('company'));
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
        $company = Companies::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:25',
            'email' => 'required|string|email',
            'website' => 'required|string|max:255'
        ]);

        // we check if the logo exist if so we validate it here
        // and send it to the database
        if ($request->hasFile('logo')) {

            if ($request->file('logo')->isValid()) {
                //
                $request->validate([
                    'logo' => 'mimes:jpeg,jpg,png|max:2048',
                ]);

                $logo = $request->file('logo');

                $url = $logo->store('public/logo');
                $company->logo = $url;
            }
        }

        // from here we save the name, email and website to the database
        $company->name = $request->input('name');
        $company->email = $request->input('email');
        $company->website = $request->input('website');

        $company->save();

        // we redirect the user to the main page of companies
        return redirect('companies')->with('success','Company added successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = Companies::findOrFail($id);
        $company->delete();
        return redirect('companies');
    }
}
