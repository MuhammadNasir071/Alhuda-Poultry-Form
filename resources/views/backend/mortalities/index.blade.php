@extends('backend.layouts.master-admin')
@section('title', 'Alhuda Poultry Form - All Mortalities')
@section('body-content')

 <!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-title">
                    <h4 class=" text-center pt-3">All Mortalities</h4>
                </div>
                <div class="px-3">
                    <div class="table-responsive table--no-card m-b-40">
                        <div class="row">
                            <div class="col-12">
                                <a href="{{ route('admin.mortalities.create') }}" class="btn btn-primary mb-2 float-end" style="float: right;">Add Mortality</a>
                            </div>
                        </div>
                        <div class="row justify-content-center my-3">
                            <div class="col-md-4">
                                <input type="text" class="search-company form-control" placeholder="Search company">
                            </div>
                            <div class="col-md-4">
                                <input type="text" class="search-shed form-control" placeholder="Search shed">
                            </div>
                            <div class="col-md-4">
                                <input type="text" class="search-date form-control" placeholder="Search Date">
                            </div>
                        </div>
                        <table id="all_mortality_list" class="table table-borderless table-striped table-earning" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Sr.</th>
                                    <th>Company</th>
                                    <th>Shed</th>
                                    <th>Day Mortality</th>
                                    <th>Night Mortality</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($mortalities as $index => $motality)
                                <tr>
                                    <td>{{$index + 1}}</td>
                                    <td class="search_company">{{isset($motality['company']['name']) ? $motality['company']['name'] : ''}}</td>
                                    <td class="search_shed">{{isset($motality['sheds']['name']) ? $motality['sheds']['name'] : ''}}</td>
                                    <td>{{$motality['day_mortality']}}</td>
                                    <td>{{$motality['night_mortality']}}</td>
                                    <td class="search-date">{{$motality['date']}}</td>
                                    <td>
                                        <a href="{{route('admin.mortalities.show', $motality->id)}}" data-id="{{$motality->id}}" class="view-property item pr-2" title="View"><i class="zmdi zmdi-eye" style="font-size:17px;"></i></a>
                                        <a href="{{route('admin.mortalities.edit', $motality->id)}}" data-id="{{$motality->id}}" class="edit-property item pr-2" title="Edit"><i class="zmdi zmdi-edit"></i></a>
                                        <a href="javascript:void(0)" data-id="{{$motality->id}}" title="Delete" id="delete-mortality"><i class="zmdi zmdi-delete" style="font-size:17px;color:red"></i></a>
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
        var table = $('#all_mortality_list').DataTable();

        // custom Search bars
        $('.search-company').on('keyup', function () {
            table.columns(1).search(this.value).draw();
        });

        $('.search-shed').on('keyup', function () {
            table.columns(2).search(this.value).draw();
        });

        $('.search-date').on('keyup', function () {
            table.columns(5).search(this.value).draw();
        });
        $('#all_mortality_list_filter').remove();
    });
</script>

<script src="{{asset('backend/custom/mortalities/create.js')}}"></script>
<script src="{{asset('backend/custom/mortalities/delete.js')}}"></script>
@endsection
