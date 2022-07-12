<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Image;
use Session;
use Storage;

class CompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $companies = Company::latest()->paginate(10);
        return view('companies.index', compact('companies'));
    }

    public function create()
    {
        return view('companies.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'max:255',
            'website' => 'max:255',
            'logo' => 'image|dimensions:min_width=100,min_height=100'
        ]);

        $company = new Company;
        $company->name = $request->name;
        $company->email = $request->email;
        $company->website = $request->website;

        if ($request->hasFile('logo'))
        {
            $image = $request->file('logo');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = storage_path('app/public/'.$filename);
            Image::make($image)->resize(400, 400)->save($location);
            $company->logo = $filename;
        }

        $company->save();

        Session::flash('success', 'This company was successfully created.');
        return redirect()->route('companies.index')->with('success', 'Company successfully registered');
    }

    public function show(Company $company)
    {
        return view('companies.show', compact('company'));
    }

    public function edit(Company $company)
    {
        return view('companies.edit', compact('company'));
    }

    public function update(Request $request, Company $company)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'max:255',
            'website' => 'max:255',
            'logo' => 'image|dimensions:min_width=100,min_height=100'
        ]);

        $company->name = $request->name;
        $company->email = $request->email;
        $company->website = $request->website;

        if ($request->hasFile('logo'))
        {
            $image = $request->file('logo');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = storage_path('app/public/'.$filename);
            Image::make($image)->resize(400, 400)->save($location);

            if($company->logo != '')
            {
                Storage::delete($company->logo);
            }

            $company->logo = $filename;
        }

        $company->save();

        Session::flash('success', 'This company was successfully edited.');
        return redirect()->route('companies.index')->with('success', 'Company successfully updated');
    }

    public function destroy(Company $company)
    {
        if($company->logo != '')
        {
            Storage::delete($company->logo);
        }
        $company->delete();

        Session::flash('success', 'The company was successfully deleted.');
        return redirect()->route('companies.index')->with('Success', 'Company successfully unregistered');
    }
}
