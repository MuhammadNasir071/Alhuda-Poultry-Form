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
                                    <td class="p-2">{{isset($expense['company']['name']) ? $expense['company']['name'] : ''}}</td>
                                    <td class="font-weight-bold p-2">Shed</td>
                                    <td class="p-2">{{isset($expense['sheds']['name']) ? $expense['sheds']['name'] : ''}}</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold p-2">Expense Type</td>
                                    <td class="p-2">{{isset($expense['expenseType']['name']) ? $expense['expenseType']['name'] : ''}}</td>
                                    <td class="font-weight-bold p-2">Invoice No</td>
                                    <td class="p-2">{{isset($expense->invoice_no) ? $expense->invoice_no : ''}}</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold p-2">Expense Details</td>
                                    <td class="p-2">{{isset($expense->expense_detail) ? $expense->expense_detail : ''}}</td>
                                    <td class="font-weight-bold p-2">Agency</td>
                                    <td class="p-2">{{isset($expense->agency) ? $expense->agency : ''}}</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold p-2">Quantity</td>
                                    <td class="p-2">{{isset($expense->quantity) ? $expense->quantity : ''}}</td>
                                    <td class="font-weight-bold p-2">Quantity Type</td>
                                    <td class="p-2">{{isset($expense->quantity_type) ? $expense->quantity_type : ''}}</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold p-2">Price</td>
                                    <td class="p-2">{{isset($expense->price) ? $expense->price : ''}}</td>
                                    <td class="font-weight-bold p-2">Date</td>
                                    <td class="p-2">{{isset($expense->date) ? $expense->date : ''}}</td>
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
