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
                    <h4 class=" text-center pt-3">Weekly Feed Report</h4>
                </div>
                @php
                    $total_feed = 0;

                @endphp
                @foreach ($groupedData as $chunk)
                    <div class="px-3">
                        <div class="table-responsive table--no-card m-b-40">
                            <table id="mortality_weekly_reports" class="table table-borderless table-striped table-earning all_shed_list" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Sr.No</th>
                                        <th>Day Feed</th>
                                        <th>Day Feed</th>
                                        <th>Date</th>
                                        <th>Week Feed</th>
                                        <th>Total Feed</th>
                                        <th>Avg Weight</th>
                                        <th>FCR</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $tday = 0; $tnight = 0; $doubletotal = 0;
                                    ?>
                                    @foreach ($chunk as $index => $feed)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $feed->day_feed }}</td>
                                            <td>{{ $feed->night_feed }}</td>
                                            <td>{{ $feed->date }}</td>
                                            <td>{{ $total_week_feed = $feed['day_feed'] + $feed['night_feed'] }}</td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                        </tr>
                                        <?php
                                            $avg_weight = $feed->avg_weight;
                                            $fcr = $feed->fcr;
                                            $tday += $feed['day_feed'];
                                            $tnight += $feed['night_feed'];
                                            $doubletotal += $total_week_feed;
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
                                            $total_feed = $total_feed + $doubletotal;

                                        @endphp
                                        <th class="center">{{$total_feed}}</th>
                                        <th class="center">{{isset($avg_weight) ? $avg_weight : '-'}}</th>
                                        <th class="center">{{isset($fcr) ? $fcr : '-'}}</th>

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
