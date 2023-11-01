@extends('backend.layouts.master-admin')
@section('title', 'Alhuda Poultry Form - All Company')
@section('body-content')

 <!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-title">
                    <h4 class=" text-center pt-3">All Companies</h4>
                </div>
                <div class="px-3">
                    <div class="table-responsive table--no-card m-b-40">
                        <div>
                            <a href="{{ route('admin.companies.create') }}" class="btn btn-primary mb-2" style="float: right;">Add Company</a>
                        </div>
                        <table id="all_company_list" class="table table-borderless table-striped table-earning" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Sr.No</th>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($companies as $index => $company)
                                <tr>
                                    <td>{{$index + 1}}</td>
                                    <td>{{$company['name']}}</td>
                                    <td>{{$company['address']}}</td>
                                    @if ($company['is_active'] == 1)
                                        <td><div class="badge badge-success">Active</div></td>
                                    @else
                                        <td><div class="badge badge-danger">In-active</div></td>
                                    @endif
                                    <td>
                                        <a href="{{route('admin.companies.show', $company->id)}}" data-id="{{$company->id}}" class="view-property item pr-2" title="View"><i class="zmdi zmdi-eye" style="font-size:17px;"></i></a>
                                        <a href="{{route('admin.companies.edit', $company->id)}}" data-id="{{$company->id}}" class="edit-property item pr-2" title="Edit"><i class="zmdi zmdi-edit"></i></a>
                                        <a href="javascript:void(0)" data-id="{{$company->id}}" class="delete-company" title="Delete"><i class="zmdi zmdi-delete" style="font-size:17px;color:red"></i></a>
                                        <br>
                                        <a href="{{route('admin.view.sheds', $company->id)}}" class="btn btn-info btn-sm">View Sheds</a>
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
        $('#all_company_list').DataTable();
    });
</script>
<script src="{{asset('backend/custom/companies/create.js')}}"></script>
<script src="{{asset('backend/custom/companies/delete.js')}}"></script>
@endsection
