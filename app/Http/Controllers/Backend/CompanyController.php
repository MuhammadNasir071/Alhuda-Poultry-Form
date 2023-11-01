<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\CompanyRequest;
use App\Models\Company;
use App\Services\Backend\CompanyService;
use App\Traits\JsonResponse;
use Illuminate\Http\Response;

class CompanyController extends Controller
{
    use JsonResponse;

    protected $companyService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(CompanyService $companyService)
    {
        $this->middleware('auth');
        $this->companyService = $companyService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = $this->companyService->getCompanies();
        return view('backend.companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.companies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CompanyRequest $request)
    {
        $this->companyService->store($request);
        return $this->success('Company added successfully', ['success' => true, 'data' => null]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        return view('backend.companies.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {
        return view('backend.companies.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CompanyRequest $request, Company $company)
    {
        $this->companyService->update($request, $company->id);
        return $this->success('Company updated successfully', ['success' => true, 'data' => null]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        try {
            $company->delete();
            return $this->success('Record deleted successfully', ['success' => true, 'data' => null]);
        } catch (\Throwable $th) {
            return $this->error('Company not found', Response::HTTP_NOT_FOUND, ['success' => false, 'data' => null]);
        }
    }
}
