@extends('backend.layouts.master-admin')
@section('body-content')

 <!-- MAIN CONTENT-->
 <div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <form id="update_admin_form" data-id="{{ $admin->id }}">
                <div class="card">
                    <div class="card-header"><h4>Edit Profile</h4></div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="form-group">
                                    <label for="full_name" class="control-label mb-1">Full Name<font color="red">*</font></label>
                                    <input type="text" id="full_name" name="full_name"  class="form-control" value="{{isset($admin->full_name) ? $admin->full_name : ''}}">
                                    @error('full_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="form-group">
                                    <label for="status" class="control-label mb-1">Status<font color="red">*</font></label>
                                    <select name="status" class="form-control" id="status" >
                                        <option value="active">Active</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="form-group">
                                    <label for="email" class="control-label mb-1">Email<font color="red">*</font></label>
                                    <input type="email" id="email" name="email" disabled class="form-control" value="{{isset($admin->email) ? $admin->email : ''}}">
                                </div>
                            </div>
                            <div class="col col-5">
                                <div class="form-group">
                                    <label for="contact" class="control-label mb-1">Contact<font color="red">*</font></label>
                                    <input type="text" id="contact" name="contact" class="form-control" value="{{isset($admin->contact) ? $admin->contact : ''}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col-4">
                                <img class="mb-2" width="170px" id="imagePreview" src="{{!is_null($admin['image']) ? url('Uploads/user/'.$admin['image']) : asset('backend/images/placeholder_image.png') }}">
                                <div class="form-group">
                                    <input id="upload-photo" name="image" type="file" onchange="loadFile(event)" accept="image/*">
                                </div>
                            </div>
                        </div><br><br>
                    <div class="form-group">
                        <button type="submit" id="update_admin_btn" class="btn btn-outline-info">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
 </div>
 @stack('scripts')
 @endsection
 @section('scripts')
 <script src="{{asset('backend/custom/admin/create.js')}}"></script>
@endsection
