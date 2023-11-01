@extends('backend.layouts.master-admin')
@section('title', 'Alhuda Poultry Form - All shed')
@section('body-content')

<style>
    th.center {
        padding-left: 36px;

    }
    .table-earning thead th{
        padding: 10px 10px !important;
    }
</style>
 <!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-title">
                    <h4 class=" text-center pt-3">Expense Report</h4>
                </div>
                <div class="px-3">
                    <div class="table-responsive table--no-card m-b-40">
                        <table id="" class="table table-borderless table-striped table-earning all_shed_list" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Sr.No</th>
                                    <th>Expense Type</th>
                                    <th>Invoice No</th>
                                    <th>Expense Details</th>
                                    <th>Agency</th>
                                    <th>Quantity</th>
                                    <th>Quantity Type</th>
                                    <th>Price</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $totalQuantity = 0;
                                    $tptalPrice = 0;
                                ?>
                                @foreach ($groupedData as $index => $expense)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $expense->expenseType->name }}</td>
                                        <td>{{ $expense->invoice_no }}</td>
                                        <td>{{ $expense->expense_detail }}</td>
                                        <td>{{ $expense->agency }}</td>
                                        <td>{{ $expense->quantity}}</td>
                                        <td>{{ $expense->quantity_type}}</td>
                                        <td>{{ $expense->price}}</td>
                                        <td>{{ $expense->date}}</td>
                                    </tr>
                                    <?php
                                        $totalQuantity += $expense->quantity;
                                        $tptalPrice += $expense->price;
                                    ?>
                                @endforeach
                                <tr>
                                    <th class="center">Total</th>
                                    <th class="center">--</th>
                                    <th class="center">--</th>
                                    <th class="center">--</th>
                                    <th class="center">--</th>
                                    <th class="center">{{$totalQuantity}}</th>
                                    <th class="center">--</th>
                                    <th class="center">{{$tptalPrice}}</th>
                                    <th class="center">--</th>
                                </tr>
                            </tbody>
                        </table>
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
