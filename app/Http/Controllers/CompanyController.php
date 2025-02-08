<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CompanyController extends Controller
{
    public function ShowCompany()
    {
        $companies = Company::withCount('user')->get();
        return view('Company.Company', compact('companies'));
    }

    public function AddCompany(Request $request)
    {
        $request->validate([
            'company_name' => 'required|string|max:255|unique:companies',
            'company_address' => 'required|string|max:255|unique:companies',
            'company_code' => 'required|string|max:255|unique:companies',
        ]);

        Company::create([
            'company_name' => $request->company_name,
            'company_address' => $request->company_address,
            'company_code' => $request->company_code,
        ]);

        $companies = Company::withCount('user')->get();
        return view('Company.Company', compact('companies'))->with('success', 'Add Company successful!');
    }

    // show view addcompany
    public function AddCompanyPage()
    {
        return view('Company.AddCompany');
    }

    // edit data company
    public function EditCompanyPage($id)
    {
        $company = Company::findOrFail($id);
        return view('/EditCompany', compact('company'));
    }

    public function UpdateCompany(Request $request, $id)
    {
        $request->validate([
            'company_name' => 'required|string|max:255|unique:companies,company_name,' . $id,
            'company_address' => 'required|string|max:255',
        ]);

        $company = Company::findOrFail($id);

        $company->company_name = $request->company_name;
        $company->company_address = $request->company_address;

        $company->save();

        return redirect('/Company/Company')->with('success', 'Company Update Succesfull');
    }

    public function DeleteCompany($id)
    {
        $company = Company::findOrFail($id);
        $company->delete();

        return redirect('/Company')->with('success', 'Company deleted');

    }
}
