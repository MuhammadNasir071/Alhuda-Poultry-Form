@extends('backend.layouts.master-admin')
@section('title', 'Alhuda Poultry Form - Add Client')
@section('body-content')

 <!-- MAIN CONTENT-->
 <div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <form class="forms-sample" method="POST" id="add_client">
                <div class="card">
                    <div class="card-header"><h4>Add Client</h4></div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col col-6">
                                <div class="form-group">
                                    <label for="name">Name<font color="red">*</font></label>
                                    <input type="text" class="form-control" name="name" id="name">
                                    @error('name')
                                        <div class="invalid-feedback {{ isset($message)?'d-block':'' }}">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col col-6">
                                <div class="form-group">
                                    <label for="client_email">Email</label>
                                    <input type="email" class="form-control" name="email" id="email">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col-6">
                                <div class="form-group">
                                    <label for="phone">Phone<font color="red">* </font></label>
                                    <input type="phone" class="form-control" name="phone" id="phone">
                                    @error('phone')
                                        <div class="invalid-feedback {{ isset($message)?'d-block':'' }}">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col-12">
                                <div class="form-group">
                                    <label for="address">Address<font color="red">* </font></label>
                                    <textarea class="form-control" name="address" id="address"></textarea>
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
                        <button type="submit" id="add-client_button" class="btn btn-outline-primary mr-2">Create</button>
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
 <script src="{{asset('backend/custom/clients/create.js')}}"></script>
@endsection
