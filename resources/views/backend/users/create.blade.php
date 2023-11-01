@extends('backend.layouts.master-admin')
@section('title', 'Alhuda Poultry Form - Add Company')
@section('body-content')

 <!-- MAIN CONTENT-->
 <div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <form class="forms-sample" method="POST" id="add_users_form">
                <div class="card">
                    <div class="card-header"><h4>Add User</h4></div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col col-6">
                                <div class="form-group">
                                    <label for="full_name">Full Name<font color="red">*</font></label>
                                    <input type="text" class="form-control" name="full_name" id="full_name"/>
                                    @error('full_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col col-6">
                                <div class="form-group">
                                    <label for="role">Role<font color="red">*</font></label>
                                    <select name="role" id="role" class="form-control">
                                        <option value="">Select a role</option>
                                        @foreach ($roles as $role)
                                            <option value="{{$role->id}}">{{$role->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col col-6">
                                <div class="form-group">
                                    <label for="email">Email<font color="red">* </font></label>
                                    <input type="email" class="form-control" name="email" id="email">
                                    @error('email')
                                        <div class="invalid-feedback {{ isset($message)?'d-block':'' }}">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col col-6">
                                <div class="form-group">
                                    <label for="contact">Contact<font color="red">* </font></label>
                                    <input type="test" class="form-control" name="contact" id="contact">
                                    @error('contact')
                                        <div class="invalid-feedback {{ isset($message)?'d-block':'' }}">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col-6">
                                <div class="form-group">
                                    <label for="password">Password<font color="red">* </font></label>
                                    <input type="text" name="password" id="password" class="form-control">
                                    @error('password')
                                        <div class="invalid-feedback {{ isset($message)?'d-block':'' }}">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div><br>
                    <div class="form-group mx-3">
                        <button type="submit" id="add_user_button" class="btn btn-outline-primary mr-2">Create</button>
                    </div>
                </div>
                <br>
            </form>
        </div>
    </div>
 </div>
 @stack('scripts')
 @endsection
 @section('scripts')
 <script src="{{asset('backend/custom/users/create.js')}}"></script>
@endsection
