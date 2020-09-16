<?php

namespace App\Http\Controllers;

use App\Companies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $validatedImage = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email',
            'logo' => 'mimes:jpeg,jpg,png|max:2048',
            'website' => 'required'
        ]);

        if ($request->hasFile('logoUpload')) {

            if ($request->file('logoUpload')->isValid()) {
                $extension = $request->logoUpload->extension();
                $request->logoUpload->storeAs('/storage/app/public', $validatedImage['name'].".".$extension);
                $url = Storage::url($validatedImage['name'].".".$extension);
                Companies::create(['logo' => $url]);
            }
        }
        /* $this->storeLogo($request); */

        $company = new Companies;
        $company->name = $request->input('name');
        $company->email = $request->input('email');
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
    public function update(Request $request)
    {
        dd($request);
        $request->validate([
            'name' => 'required|string|max:25',
            'email' => 'required|string|email|unique:user',
            'logo' => 'required|mimes:jpg,png|max:2048',
            'website' => 'required'
        ]);
        $companyModel = new Companies;

        if($request->file()) {
            $fileName = time().'_'.$request->logo->getClientOriginalName();
            $filePath = $request->file('logoUpload')->storeAs('uploads', $fileName, 'public');

            $companyModel->name = time().'_'.$request->file->getClientOriginalName();
            $companyModel->file_path = '/storage/' . $filePath;
            $companyModel->save();

            return back()
            ->with('success','File has been uploaded.')
            ->with('file', $fileName);
        }
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

    public function storeLogo(Request $request)
    {
    }
}
