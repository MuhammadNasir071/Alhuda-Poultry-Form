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
                    <h4 class=" text-center pt-3">Weekly Mortality Report</h4>
                </div>
                @php
                    $total_mortality = 0;
                    $remaning_mortality = $shed->quantity;
                @endphp
                @foreach ($groupedData as $chunk)
                    <div class="px-3">
                        <div class="table-responsive table--no-card m-b-40">
                            <table id="mortality_weekly_reports" class="table table-borderless table-striped table-earning all_shed_list" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Sr.No</th>
                                        <th>Day Mortality</th>
                                        <th>Day Mortality</th>
                                        <th>Date</th>
                                        <th>Week Mortality</th>
                                        <th>Total Mortality</th>
                                        <th>Remaining</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $tday = 0; $tnight = 0; $doubletotal = 0;
                                    ?>
                                    @foreach ($chunk as $index => $mortality)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $mortality->day_mortality }}</td>
                                            <td>{{ $mortality->night_mortality }}</td>
                                            <td>{{ $mortality->date }}</td>
                                            <td>{{ $total_week_mortality = $mortality['day_mortality'] + $mortality['night_mortality'] }}</td>
                                            <td>-</td>
                                            <td>-</td>
                                        </tr>
                                        <?php
                                            $tday += $mortality['day_mortality'];
                                            $tnight += $mortality['night_mortality'];
                                            $doubletotal += $total_week_mortality;
                                            // $remaining_shed_quantity += $remaining_shed_quantity;
                                        ?>
                                    @endforeach
                                    <tr>
                                        <th class="center">Total</th>
                                        <th class="center">{{$tday}}</th>
                                        <th class="center">{{$tnight}}</th>
                                        <th class="center">--</th>
                                        <th class="center">{{$doubletotal}}</th>

                                        @php
                                            $total_mortality = $total_mortality + $doubletotal;
                                            $remaning_mortality = $remaning_mortality - $doubletotal;
                                        @endphp
                                        <th class="center">{{$total_mortality}}</th>
                                        <th class="center">{{$remaning_mortality}}</th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>


@stack('scripts')
@endsection
@section('scripts')


@endsection
