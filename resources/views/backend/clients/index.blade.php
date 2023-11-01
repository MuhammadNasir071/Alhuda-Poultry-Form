@extends('backend.layouts.master-admin')
@section('title', 'Alhuda Poultry Form - All Mortalities')
@section('body-content')

 <!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-title">
                    <h4 class=" text-center pt-3">All Clients</h4>
                </div>
                <div class="px-3">
                    <div class="table-responsive table--no-card m-b-40">
                        <div>
                            <a href="{{ route('admin.clients.create') }}" class="btn btn-primary mb-2" style="float: right;">Add Client</a>
                        </div>
                        <table id="all_client_list" class="table table-borderless table-striped table-earning" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Sr.No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($clients as $index => $client)
                                <tr>
                                    <td>{{$index + 1}}</td>
                                    <td>{{$client['name']}}</td>
                                    <td>{{$client['email']}}</td>
                                    <td>{{$client['phone']}}</td>
                                    <td>{{$client['address']}}</td>
                                    <td>
                                        <a href="{{route('admin.clients.show', $client->id)}}" data-id="{{$client->id}}" class="view-property item pr-2" title="View"><i class="zmdi zmdi-eye" style="font-size:17px;"></i></a>
                                        <a href="{{route('admin.clients.edit', $client->id)}}" data-id="{{$client->id}}" class="edit-property item pr-2" title="Edit"><i class="zmdi zmdi-edit"></i></a>
                                        <a href="javascript:void(0)" data-id="{{$client->id}}" title="Delete" class="delete_client"><i class="zmdi zmdi-delete" style="font-size:17px;color:red"></i></a>
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
        $('#all_client_list').DataTable();
    });
</script>
<script src="{{asset('backend/custom/clients/delete.js')}}"></script>
@endsection
