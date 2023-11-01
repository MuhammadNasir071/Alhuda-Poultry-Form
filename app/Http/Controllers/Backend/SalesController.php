<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\SalesRequest;
use App\Http\Requests\Backend\UpdateSalesRequest;
use App\Models\Shed;
use App\Models\Company;
use App\Models\Client;
use App\Models\Sale;
use App\Services\Backend\SaleService;
use App\Traits\JsonResponse;
use Illuminate\Http\Response;

class SalesController extends Controller
{
    use JsonResponse;

    protected $saleService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(SaleService $saleService)
    {
        $this->middleware('auth');
        $this->saleService = $saleService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sales = $this->saleService->getSales();
        return view('backend.sales.index', compact('sales'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sheds = Shed::where('is_active', 1)->get();
        $clients = Client::get();
        $companies = Company::where('is_active', 1)->get();
        return view('backend.sales.create',compact('companies','sheds','clients'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SalesRequest $request)
    {
        $this->saleService->store($request);
        return $this->success('Sale added successfully', ['success' => true, 'data' => null]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Sale $sale)
    {
        $sale = $this->saleService->singleSale($sale);
        return view('backend.sales.show',compact('sale'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sale $sale)
    {
        $clients = Client::all();
        return view('backend.sales.edit', compact('sale', 'clients'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSalesRequest $request, Sale $sale)
    {
        $this->saleService->update($request, $sale->id);
        return $this->success('Sale updated successfully', ['success' => true, 'data' => null]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sale $sale)
    {
        try {
            $sale->delete();
            return $this->success('Record deleted successfully', ['success' => true, 'data' => null]);
        } catch (\Throwable $th) {
            return $this->error('Sale not found', Response::HTTP_NOT_FOUND, ['success' => false, 'data' => null]);
        }
    }

    // public function weeklyReport($id)
    // {
    //     $shed = Shed::where('id' , $id)->first();
    //     $groupedData = $this->mortalityService->weekly_report($id);
    //     return view('backend.reports.weekly_report', compact('groupedData','shed'));
    // }
}
