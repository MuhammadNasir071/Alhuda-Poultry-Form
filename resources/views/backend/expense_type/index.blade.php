@extends('backend.layouts.master-admin')
@section('title', 'Alhuda Poultry Form - All Mortalities')
@section('body-content')

 <!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-title">
                    <h4 class=" text-center pt-3">All Expense Types</h4>
                </div>
                <div class="px-3">
                    <div class="table-responsive table--no-card m-b-40">
                        <div>
                            <a href="{{ route('admin.expensetype.create') }}" class="btn btn-primary mb-2" style="float: right;">Add Expense Type</a>
                        </div>
                        <table id="all_expense_type_list" action="" method="POST" class="table table-borderless table-striped table-earning" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Sr.No</th>
                                    <th>Expense Type</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($expense_types as $index => $expense_type)
                                <tr>
                                    <td>{{$index + 1}}</td>
                                    <td>{{$expense_type['name']}}</td>
                                    <td><div class="badge badge-success">Active</div></td>
                                    <td>
                                        <a href="javascript:void(0)" data-id="{{$expense_type->id}}" class="delete_expense_type" title="Delete"><i class="zmdi zmdi-delete" style="font-size:17px;color:red"></i></a>
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
    $(document).ready( function () {
        $('#all_expense_type_list').DataTable();
    });
</script>
<script src="{{asset('backend/custom/expenses/expence_type_delete.js')}}"></script>
@endsection
