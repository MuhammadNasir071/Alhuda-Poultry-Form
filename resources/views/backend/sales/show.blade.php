@extends('backend.layouts.master-admin')
@section('title', 'Alhuda Poultry Form - Company Detail')
@section('body-content')

<style>
    .font-weight-bold{
        /* color: red; */
    }
</style>
 <!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-title">
                    <h3 class=" text-center pt-3">Expenses</h3>
                </div>
                <div class="card-body">
                    {{-- expense view --}}
                    <div id="expense" class="">
                        <div class=" mt-2">
                            <table class="table-bordered col-lg-12">
                                <tr>
                                    <td class="font-weight-bold p-2">Company</td>
                                    <td class="p-2">{{isset($sale->company->name) ? $sale->company->name : ''}}</td>
                                    <td class="font-weight-bold p-2">Shed</td>
                                    <td class="p-2">{{isset($sale->sheds->name) ? $sale->sheds->name : ''}}</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold p-2">Client</td>
                                    <td class="p-2">{{isset($sale->clients->name) ? $sale->clients->name : ''}}</td>
                                    <td class="font-weight-bold p-2">Vehicle No</td>
                                    <td class="p-2">{{isset($sale->vehicle_no) ? $sale->vehicle_no : ''}}</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold p-2">Initial Weight</td>
                                    <td class="p-2">{{isset($sale->initial_weight) ? $sale->initial_weight : ''}}</td>
                                    <td class="font-weight-bold p-2">Final Weight</td>
                                    <td class="p-2">{{isset($sale->final_weight) ? $sale->final_weight : ''}}</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold p-2">Total Weight</td>
                                    <td class="p-2">{{isset($sale->total_weight) ? $sale->total_weight : ''}}</td>
                                    <td class="font-weight-bold p-2">Rate</td>
                                    <td class="p-2">{{isset($sale->rate) ? $sale->rate : ''}}</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold p-2">Total Price</td>
                                    <td class="p-2">{{isset($sale->total_price) ? $sale->total_price : ''}}</td>
                                    <td class="font-weight-bold p-2">Payment Type</td>
                                    <td class="p-2">{{isset($sale->payment_type) ? $sale->payment_type : ''}}</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold p-2">Payment Status</td>
                                    <td class="p-2" colspan="3">{{isset($sale->payment_status) ? $sale->payment_status : ''}}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@stack('scripts')
@endsection
@section('scripts')
@endsection
