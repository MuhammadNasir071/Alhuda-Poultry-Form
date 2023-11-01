<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\MortalityRequest;
use App\Http\Requests\Backend\UpdateMortalityRequest;
use App\Models\Company;
use App\Models\Mortality;
use App\Models\Shed;
use App\Services\Backend\MortalityService;
use App\Traits\JsonResponse;
use Illuminate\Http\Response;

class MortalityController extends Controller
{
    use JsonResponse;

    protected $mortalityService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(MortalityService $mortalityService)
    {
        $this->middleware('auth');
        $this->mortalityService = $mortalityService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mortalities = $this->mortalityService->getMortalities();
        return view('backend.mortalities.index', compact('mortalities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $companies = Company::where('is_active', 1)->get();
        return view('backend.mortalities.create',compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MortalityRequest $request)
    {
        $this->mortalityService->store($request);
        return $this->success('Mortality added successfully', ['success' => true, 'data' => null]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Mortality $mortality)
    {
        return view('backend.mortalities.show', compact('mortality'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mortality $mortality)
    {
        return view('backend.mortalities.edit', compact('mortality'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMortalityRequest $request, Mortality $mortality)
    {
        $this->mortalityService->update($request, $mortality);
        return $this->success('Mortality updated successfully', ['success' => true, 'data' => null]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mortality $mortality)
    {
        try {
            $mortality->delete();
            return $this->success('Record deleted successfully', ['success' => true, 'data' => null]);
        } catch (\Throwable $th) {
            return $this->error('Mortality not found', Response::HTTP_NOT_FOUND, ['success' => false, 'data' => null]);
        }
    }

    public function getCompanySheds($company_id)
    {
        $sheds = Shed::where('company_id', $company_id)->where('is_active', 1)->get();
        return $this->success('', ['success' => true, 'sheds' =>$sheds]);
    }
    public function getCompanyShed_history($company_id)
    {
        $sheds = Shed::where('company_id', $company_id)->where('is_active', 0)->get();
        return $this->success('', ['success' => true, 'sheds' =>$sheds]);
    }
}
