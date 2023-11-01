@extends('backend.layouts.master-admin')
@section('title', 'Alhuda Poultry Form - All Feeds')
@section('body-content')

<style>
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
                    <h4 class=" text-center pt-3">All Feeds</h4>
                </div>
                <div class="px-3">
                    <div class="table-responsive table--no-card m-b-40">
                        <div class="row">
                            <div class="col-12">
                                <a href="{{ route('admin.feeds.create') }}" class="btn btn-primary mb-2 float-end" style="float: right;">Add Feed</a>
                                <a href="{{ route('admin.feeds.add.avg_weight') }}" class="btn btn-success mr-2 mb-2 float-end" style="float: right;">Add Weekly Avg Weight</a>
                            </div>
                        </div>
                        <div class="row justify-content-center my-3">
                            <div class="col-md-4">
                                <input type="text" class="search_company form-control" placeholder="Search company">
                            </div>
                            <div class="col-md-4">
                                <input type="text" class="search_shed form-control" placeholder="Search shed">
                            </div>
                            <div class="col-md-4">
                                <input type="text" class="search_date form-control" placeholder="Search Date">
                            </div>
                        </div>
                        <table id="all_feed_list" class="table table-borderless table-striped table-earning" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Sr.</th>
                                    <th>Company</th>
                                    <th>Shed</th>
                                    <th>Day Feed</th>
                                    <th>Night Feed</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($feeds as $index => $feed)
                                <tr>
                                    <td>{{$index + 1}}</td>
                                    <td class="search_company">{{isset($feed['company']['name']) ? $feed['company']['name'] : ''}}</td>
                                    <td class="search_shed">{{isset($feed['sheds']['name']) ? $feed['sheds']['name'] : ''}}</td>
                                    <td>{{$feed['day_feed']}}</td>
                                    <td>{{$feed['night_feed']}}</td>
                                    <td class="search_date">{{$feed['date']}}</td>
                                    <td>
                                        <a href="{{route('admin.feeds.show', $feed->id)}}" data-id="{{$feed->id}}" class="item pr-2" title="View"><i class="zmdi zmdi-eye" style="font-size:17px;"></i></a>
                                        <a href="{{route('admin.feeds.edit', $feed->id)}}" data-id="{{$feed->id}}" class="item pr-2" title="Edit"><i class="zmdi zmdi-edit"></i></a>
                                        <a href="javascript:void(0)" data-id="{{$feed->id}}" title="Delete" id="delete_feed"><i class="zmdi zmdi-delete" style="font-size:17px;color:red"></i></a>
                                    </td>
                                </tr>
                                @endforeach
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
<script>
    jQuery(document).ready(function ($) {
        var table = $('#all_feed_list').DataTable();

        // custom Search bars
        $('.search_company').on('keyup', function () {
            table.columns(1).search(this.value).draw();
        });

        $('.search_shed').on('keyup', function () {
            table.columns(2).search(this.value).draw();
        });

        $('.search_date').on('keyup', function () {
            table.columns(5).search(this.value).draw();
        });
        $('#all_feed_list_filter').remove();
    });
</script>
<script src="{{asset('backend/custom/feeds/delete.js')}}"></script>
@endsection
