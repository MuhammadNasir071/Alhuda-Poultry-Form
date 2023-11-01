@extends('backend.layouts.master-admin')
@section('body-content')

 <!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content">
        <div class="container-fluid">
            <div class="card">
                <div class="p-4">
                    <table id="all_user_list" class="table table-borderless table-striped table-earning" style="width:100%">
                        <thead>
                            <tr>
                                <th>Sr.No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Contact</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($users as $index => $user)
                            <tr>
                                <td>{{$index + 1}}</td>
                                <td>{{$user['full_name']}}</td>
                                <td>{{$user['email']}}</td>
                                <td>{{isset($user['contact']) ? $user['contact'] : ''}}</td>
                                @if(isset($user->status) && $user->status == 'active' )
                                    <td><div class="badge badge-success">Active</div></td>
                                @elseif(isset($user->status) && $user->status == 'pending' )
                                    <td><div class="badge badge-warning">Pending</div></td>
                                @else
                                    <td><div class="badge badge-danger">Deactive</div></td>
                                @endif
                                <td>
                                    <a href="{{route('admin.users.show', $user->id)}}" data-id="{{$user->id}}" class="view-user item pr-2" title="View"><i class="zmdi zmdi-eye" style="font-size:17px;"></i></a>
                                    <a href="{{route('admin.users.edit', $user->id)}}" data-id="{{$user->id}}" class="edit-user item pr-2" title="Edit"><i class="zmdi zmdi-edit"></i></a>
                                    <a href="javascript:void(0)" data-id="{{$user->id}}" class="delete-user"><i class="zmdi zmdi-delete" title="Delete" style="font-size:17px;color:red"></i></a>
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


@stack('scripts')
@endsection
@section('scripts')

<script>
    $(document).ready( function () {
        $('#all_user_list').DataTable();
    });
</script>
<script src="{{asset('backend/custom/users/create.js')}}"></script>
<script src="{{asset('backend/custom/users/delete.js')}}"></script>
@endsection
