@extends('backend.layouts.master-admin')
@section('title', 'Alhuda Poultry Form - All shed')
@section('body-content')

 <!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-title">
                    <h4 class=" text-center pt-3">All Users</h4>
                </div>
                <div class="px-3">
                    <div class="table-responsive table--no-card m-b-40">
                        <div>
                            <a href="{{ route('admin.users.create') }}" class="btn btn-primary mb-2" style="float: right;">Add User</a>
                        </div>
                        <table id="all_users_list" class="table table-borderless table-striped table-earning" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Sr.No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Contact</th>
                                    <th>Password</th>
                                    <th>Role</th>
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
                                    <td>{{$user['contact']}}</td>
                                    <td>{{$user['pass']}}</td>
                                    <td>{{$user['roles'][0]['id']}}</td>
                                    @if ($user['status'] == 'active')
                                        <td><div class="badge badge-success">Active</div></td>
                                    @else
                                        <td><div class="badge badge-danger">In-active</div></td>
                                    @endif
                                    <td>
                                        <a href="javascript:void(0)" data-id="{{$user->id}}" class="delete_user" title="Delete"><i class="zmdi zmdi-delete" style="font-size:17px;color:red"></i></a>
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
        $('#all_users_list').DataTable();
    });
</script>
<script src="{{asset('backend/custom/users/delete.js')}}"></script>
@endsection
