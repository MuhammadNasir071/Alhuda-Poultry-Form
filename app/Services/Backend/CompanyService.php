<?php

namespace App\Services\Backend;

use App\Models\Company;
use Illuminate\Support\Str;

class CompanyService
{

    public function getCompanies()
    {
        return Company::get();
    }


    public function store($request)
    {
        Company::create([
            'user_id' => auth()->id(),
            'name' => $request->name,
            'is_active' => $request->is_active ?? 0,
            'address' => $request->address,
        ]);
    }

    public function update($request, $company_id)
    {
        $company = Company::find($company_id);
        if($company){
            $company->update([
                'user_id' => auth()->id(),
                'name' => $request->name,
                'is_active' => $request->is_active ?? 0,
                'address' => $request->address,
            ]);
        }
    }
}
