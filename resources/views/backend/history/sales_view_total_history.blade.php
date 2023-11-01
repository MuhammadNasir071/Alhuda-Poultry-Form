@extends('backend.layouts.master-admin')
@section('title', 'Alhuda Poultry Form - Sales Total Report')
@section('body-content')

<style>
    th.center {
        padding-left: 36px;

    }
    .table-earning thead th{
        padding: 10px 10px !important;
    }
    .loss {
    border-bottom: 2px solid red; /* You can adjust the color and thickness as needed */
    }

    .profit {
        border-bottom: 2px solid green; /* You can adjust the color and thickness as needed */
    }
</style>
 <!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-title">
                    <h4 class=" text-center pt-3">Sales Report</h4>
                </div>
                <div class="px-3">
                    <div class="table-responsive table--no-card m-b-40">
                        <table id="" class="table table-borderless table-striped table-earning all_shed_list" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Sr.No</th>
                                    <th>Client Name</th>
                                    <th>Rate</th>
                                    <th>Initial Weight</th>
                                    <th>Final Weight</th>
                                    <th>Total Weight</th>
                                    <th>Total Price</th>
                                    <th>Payment Type</th>
                                    <th>Payment Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $totalInitial_weight = 0;
                                    $totalFinal_weight = 0;
                                    $totalWeight = 0;
                                    $totalPrice = 0;
                                    $pending_amount = 0;
                                    $received_amount = 0;
                                ?>
                                @foreach ($groupedData as $index => $sale)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $sale['clients']['name'] }}</td>
                                        <td>{{ $sale->rate }}</td>
                                        <td>{{ $sale->initial_weight }}</td>
                                        <td>{{ $sale->final_weight }}</td>
                                        <td>{{ $sale->total_weight }}</td>
                                        <td>{{ $sale->total_price }}</td>
                                        <td>{{ $sale->payment_type }}</td>
                                        <td>{{ $sale->payment_status }}</td>
                                    </tr>
                                    <?php
                                        $totalInitial_weight += $sale->initial_weight;
                                        $totalFinal_weight += $sale->final_weight;
                                        $totalWeight += $sale->total_weight;
                                        $totalPrice += $sale->total_price;

                                        // for second table
                                        if($sale->payment_status == 'Paid')
                                        {
                                            $received_amount += $sale->total_price;
                                        }
                                        else{
                                            $pending_amount += $sale->total_price;
                                        }
                                    ?>
                                @endforeach
                                <tr>
                                    <th class="center">Total</th>
                                    <th class="center">--</th>
                                    <th class="center">--</th>
                                    <th class="center">{{$totalInitial_weight}}</th>
                                    <th class="center">{{$totalFinal_weight}}</th>
                                    <th class="center">{{$totalWeight}}</th>
                                    <th class="center">{{$totalPrice}}</th>
                                    <th class="center">--</th>
                                    <th class="center">--</th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <br><hr><br>
                <div class="px-3">
                    <h4 class=" text-center pb-3">Payments Detail </h4>
                    <div class="table-responsive table--no-card m-b-40">
                        <table id="" class="table table-borderless table-striped table-earning all_shed_list" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Total Sale</th>
                                    <th>Pending Amount</th>
                                    <th>Received Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <td>{{$totalPrice}}</td>
                                <td>{{$pending_amount}}</td>
                                <td>{{$received_amount}}</td>
                            </tbody>
                        </table>
                    </div>
                </div>
                <hr>
                <div class="px-3">
                    <h4 class=" text-center pb-3">Profit/Loss Detail </h4>
                    <div class="table-responsive table--no-card m-b-40">
                        <table id="" class="table table-borderless table-striped table-earning all_shed_list" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Total Sale</th>
                                    <th>Shed Cost</th>
                                    <th>Total Expense</th>
                                    <th>Profit/Loss</th>
                                </tr>
                            </thead>
                            <tbody>
                                <td>{{$totalPrice}}</td>
                                <td>{{isset($shed['price']) ? $shed['price'] : '-'}}</td>
                                <td>{{isset($total_expense) && !is_null($total_expense) ? $total_expense : '-'}}</td>

                                @php
                                    $profitloss = $shed['price'] + $total_expense;
                                    $profitloss = $totalPrice - $profitloss
                                @endphp
                                <td>
                                    <span  class="{{ isset($profitloss) && $profitloss > 0 ? 'profit' : 'loss' }}">{{ isset($profitloss) && $profitloss > 0 ? $profitloss.' - Profit' : $profitloss. ' - Loss' }}</span>
                                </td>

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
