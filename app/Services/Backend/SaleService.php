<?php

namespace App\Services\Backend;

use App\Models\Shed;
use App\Models\Sale;

class SaleService
{

    public function getSales()
    {
        return Sale::with('company', 'sheds', 'clients')->get();
    }
    public function view_sheds($company_id)
    {
        return Shed::where('company_id', $company_id)->where('is_active', 1)->get();
    }

    public function store($request)
    {
        $total_weight = 0;
        if(!is_null($request->final_weight)){
            $total_weight = $request->final_weight - $request->initial_weight;
        }

        Sale::create([
            'company_id' => $request->company_id,
            'shed_id' => $request->shed_id,
            'client_id' => $request->client_id,
            'vehicle_no' => $request->vehicle_no,
            'initial_weight' => $request->initial_weight,
            'final_weight' => $request->final_weight,
            'total_weight' => $total_weight,
            'rate' => $request->rate,
            'total_price' => $request->final_price,
            'payment_type' => $request->payment_type,
            'payment_status' => $request->payment_status,
        ]);
    }

    public function update($request, $sale_id)
    {
        $total_weight = $request->final_weight - $request->initial_weight;
        $sale = Sale::find($sale_id);
        if($sale){
            $sale->update([
                'vehicle_no' => $request->vehicle_no,
                'initial_weight' => $request->initial_weight,
                'final_weight' => $request->final_weight,
                'total_weight' => $total_weight,
                'rate' => $request->rate,
                'total_price' => $request->final_price,
                'payment_type' => $request->payment_type,
                'payment_status' => $request->payment_status,
            ]);
        }
    }

    public function singleSale($sale)
    {
        return $sale->with('company', 'sheds', 'clients')->first();
    }
}
