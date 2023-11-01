@extends('backend.layouts.master-admin')
@section('title', 'Alhuda Poultry Form - All Mortalities')
@section('body-content')

 <!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-title">
                    <h4 class=" text-center pt-3">All Expenses</h4>
                </div>
                <div class="px-3">
                    <div class="table-responsive table--no-card m-b-40">
                        <div class="row">
                            <div class="col-12">
                                <a href="{{ route('admin.expenses.create') }}" class="btn btn-primary mb-2" style="float: right;">Add Expense</a>
                                <a href="{{ route('admin.expensetype.index') }}" class="btn btn-success mb-2 mr-2" style="float: right;">Expense Type</a>
                            </div>
                        </div>
                        <div class="row justify-content-center my-3">
                            <div class="col-md-3">
                                <input type="text" class="search_company form-control" placeholder="Search company">
                            </div>
                            <div class="col-md-3">
                                <input type="text" class="search_shed form-control" placeholder="Search shed">
                            </div>
                            <div class="col-md-3">
                                <input type="text" class="search_expense_type form-control" placeholder="Search expense type">
                            </div>
                            <div class="col-md-3">
                                <input type="text" class="search_date form-control" placeholder="Search Date">
                            </div>
                        </div>
                        <table id="all_expense_list" class="table table-borderless table-striped table-earning" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Sr.No</th>
                                    <th>Invoice No</th>
                                    <th>Company</th>
                                    <th>Shed</th>
                                    <th>Expense Type</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($expenses as $index => $expense)
                                <tr>
                                    <td>{{$index + 1}}</td>
                                    <td>{{$expense['invoice_no']}}</td>
                                    <td class="search_company">{{isset($expense['company']['name']) ? $expense['company']['name'] : ''}}</td>
                                    <td class="search_shed">{{isset($expense['sheds']['name']) ? $expense['sheds']['name'] : ''}}</td>
                                    <td class="search_expense_type">{{isset($expense['expenseType']['name']) ? $expense['expenseType']['name'] : ''}}</td>
                                    <td style="search_date">{{$expense['date']}}</td>
                                    <td>
                                        <a href="{{route('admin.expenses.show', $expense->id)}}" data-id="{{$expense->id}}" class="view-property item pr-2" title="View"><i class="zmdi zmdi-eye" style="font-size:17px;"></i></a>
                                        <a href="{{route('admin.expenses.edit', $expense->id)}}" data-id="{{$expense->id}}" class="edit-property item pr-2" title="Edit"><i class="zmdi zmdi-edit"></i></a>
                                        <a href="javascript:void(0)" data-id="{{$expense->id}}" title="Delete" id="delete-expense"><i class="zmdi zmdi-delete" style="font-size:17px;color:red"></i></a>
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
        var table = $('#all_expense_list').DataTable();

        // custom Search bars
        $('.search_company').on('keyup', function () {
            table.columns(2).search(this.value).draw();
        });

        $('.search_shed').on('keyup', function () {
            table.columns(3).search(this.value).draw();
        });

        $('.search_expense_type').on('keyup', function () {
            table.columns(4).search(this.value).draw();
        });

        $('.search_date').on('keyup', function () {
            table.columns(5).search(this.value).draw();
        });
        $('#all_expense_list_filter').remove();
    });
</script>
<script src="{{asset('backend/custom/expenses/delete.js')}}"></script>
@endsection
