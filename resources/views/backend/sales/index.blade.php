@extends('backend.layouts.master-admin')
@section('title', 'Alhuda Poultry Form - All Sales')
@section('body-content')

 <!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-title">
                    <h4 class=" text-center pt-3">All Sales</h4>
                </div>
                <div class="px-3">
                    <div class="table-responsive table--no-card m-b-40">
                        <div class="row">
                            <div class="col-12">
                                    <a href="{{ route('admin.sales.create') }}" class="btn btn-primary mb-2" style="float: right;">Add Sale</a>
                            </div>
                        </div>
                        <div class="row justify-content-center my-3">
                            <div class="col-md-3">
                                <input type="text" class="search_shed form-control" placeholder="Search shed">
                            </div>
                            <div class="col-md-3">
                                <input type="text" class="search_vehicle_no form-control" placeholder="Search vehicle number">
                            </div>
                            <div class="col-md-3">
                                <input type="text" class="search_client form-control" placeholder="Search client">
                            </div>
                            <div class="col-md-3">
                                <input type="text" class="search_payment_status form-control" placeholder="Search payment status">
                            </div>
                        </div>
                        <table id="all_sale_list" class="table table-borderless table-striped table-earning" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Sr.</th>
                                    <th>Shed</th>
                                    <th>Vehicle No</th>
                                    <th>Client</th>
                                    <th>Total Price</th>
                                    <th>Payment Type</th>
                                    <th>Payment Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($sales as $index => $sale)
                                <tr>
                                    <td>{{$index + 1}}</td>
                                    <td class="search_shed">{{isset($sale['sheds']['name']) ? $sale['sheds']['name'] : ''}}</td>
                                    <td class="search_vehicle_no">{{$sale['vehicle_no']}}</td>
                                    <td class="search_client">{{$sale['clients']['name']}}</td>
                                    <td>{{$sale['total_price']}}</td>
                                    <td>{{$sale['payment_type']}}</td>
                                    @if ($sale['payment_status'] == 'Paid')
                                        <td class="search_payment_status"><div class="badge badge-success">Paid</div></td>
                                    @else
                                        <td class="search_payment_status"><div class="badge badge-danger">Pending</div></td>
                                    @endif
                                    <td>
                                        <a href="{{route('admin.sales.show', $sale->id)}}" data-id="{{$sale->id}}" class="view-property item pr-2" title="View"><i class="zmdi zmdi-eye" style="font-size:17px;"></i></a>
                                        <a href="{{route('admin.sales.edit', $sale->id)}}" data-id="{{$sale->id}}" class="edit-property item pr-2" title="Edit"><i class="zmdi zmdi-edit"></i></a>
                                        <a href="javascript:void(0)" data-id="{{$sale->id}}" title="Delete" class="delete-sale"><i class="zmdi zmdi-delete" style="font-size:17px;color:red"></i></a>
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
    $(document).ready(function () {
        var table = $('#all_sale_list').DataTable();

        // custom Search bars

        $('.search_shed').on('keyup', function () {
            table.columns(1).search(this.value).draw();
        });

        $('.search_vehicle_no').on('keyup', function () {
            table.columns(2).search(this.value).draw();
        });

        $('.search_client').on('keyup', function () {
            table.columns(3).search(this.value).draw();
        });

        $('.search_payment_status').on('keyup', function () {
            table.columns(6).search(this.value).draw();
        });

        $('#all_sale_list_filter').remove();
    });
</script>
<script src="{{asset('backend/custom/sales/delete.js')}}"></script>
@endsection
