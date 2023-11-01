<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\ShedsRequest;
use App\Models\Company;
use App\Models\Shed;
use App\Services\Backend\ShedsService;
use App\Traits\JsonResponse;
use Illuminate\Http\Response;

class ShedsController extends Controller
{
    use JsonResponse;

    protected $shedsService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ShedsService $shedsService)
    {
        $this->middleware('auth');
        $this->shedsService = $shedsService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sheds = $this->shedsService->getSheds();
        return view('backend.sheds.index', compact('sheds'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $companies = Company::where('is_active', 1)->get();
        return view('backend.sheds.create', compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ShedsRequest $request)
    {
        $this->shedsService->store($request);
        return $this->success('Shed added successfully', ['success' => true, 'data' => null]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Shed $shed)
    {
        return view('backend.sheds.show', compact('shed'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Shed $shed)
    {
        return view('backend.sheds.edit', compact('shed'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ShedsRequest $request, Shed $shed)
    {
        // dd($request);
        $this->shedsService->update($request, $shed->id);
        return $this->success('Shed updated successfully', ['success' => true, 'data' => null]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Shed $shed)
    {
        try {
            $shed->delete();
            return $this->success('Record deleted successfully', ['success' => true, 'data' => null]);
        } catch (\Throwable $th) {
            return $this->error('Shed not found', Response::HTTP_NOT_FOUND, ['success' => false, 'data' => null]);
        }
    }
    public function viewSheds($id)
    {
        $sheds = $this->shedsService->view_sheds($id);
        return view('backend.sheds.index', compact('sheds'));
    }

}
