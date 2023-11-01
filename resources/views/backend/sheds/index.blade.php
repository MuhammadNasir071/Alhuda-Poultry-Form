@extends('backend.layouts.master-admin')
@section('title', 'Alhuda Poultry Form - All shed')
@section('body-content')

 <!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-title">
                    <h4 class=" text-center pt-3">All Sheds</h4>
                </div>
                <div class="px-3">
                    <div class="table-responsive table--no-card m-b-40">
                        <div>
                            <a href="{{ route('admin.sheds.create') }}" class="btn btn-primary mb-2" style="float: right;">Add shed</a>
                        </div>
                        <table id="all_shed_list" class="table table-borderless table-striped table-earning" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Sr.No</th>
                                    <th>Name</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Company</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sheds as $index => $shed)
                                <tr>
                                    <td>{{$index + 1}}</td>
                                    <td>{{$shed['name']}}</td>
                                    <td>{{$shed['quantity']}}</td>
                                    <td>{{$shed['price']}}</td>
                                    <td>{{isset($shed['company']['name']) ? $shed['company']['name'] : ''}}</td>
                                    @if ($shed['is_active'] == 1)
                                        <td><div class="badge badge-success">Active</div></td>
                                    @else
                                        <td><div class="badge badge-danger">In-active</div></td>
                                    @endif
                                    <td>
                                        <a href="{{route('admin.sheds.show', $shed->id)}}" data-id="{{$shed->id}}" class="view-property item pr-2" title="View"><i class="zmdi zmdi-eye" style="font-size:17px;"></i></a>
                                        <a href="{{route('admin.sheds.edit', $shed->id)}}" data-id="{{$shed->id}}" class="edit-property item pr-2" title="Edit"><i class="zmdi zmdi-edit"></i></a>
                                        <a href="javascript:void(0)" data-id="{{$shed->id}}" class="delete-shed" title="Delete"><i class="zmdi zmdi-delete" style="font-size:17px;color:red"></i></a>
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
        $('#all_shed_list').DataTable();
    });
</script>
<script src="{{asset('backend/custom/sheds/create.js')}}"></script>
<script src="{{asset('backend/custom/sheds/delete.js')}}"></script>
@endsection
