@extends('backend.layouts.master-admin')
@section('title', 'Alhuda Poultry Form - Edit Company')
@section('body-content')

 <!-- MAIN CONTENT-->
 <div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <form id="update_company" method="post" data-id="{{ $company->id }}">
                <div class="card">
                    <div class="card-header"><h4>Edit Company</h4></div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col col-6">
                                <div class="form-group">
                                    <label for="name">Name<font color="red">*</font></label>
                                    <input type="text" class="form-control" name="name" id="name" value="{{$company->name}}">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col col-5 d-flex align-items-center">
                                <div class="form-group">
                                    <input type="checkbox" id="is_active" name="is_active" value="1" {{$company->is_active == 1 ? 'checked' : ''}}>
                                    <label for="is_active" class="m-0">Is Active?<font color="red"></font></label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col col-12">
                                <div class="form-group">
                                    <label for="address">Address<font color="red">* </font></label>
                                    <textarea class="form-control" name="address" id="address" value="{{$company->address}}">{{$company->address}}</textarea>
                                    @error('address')
                                        <div class="invalid-feedback {{ isset($message)?'d-block':'' }}">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div><br>
                    <div class="form-group mx-3">
                        <button type="submit" id="update_company_btn" class="btn btn-outline-primary mr-2">Update</button>
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
 <script src="{{asset('backend/custom/companies/create.js')}}"></script>
@endsection
