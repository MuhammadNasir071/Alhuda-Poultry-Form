@extends('backend.layouts.master-admin')
@section('title', 'Alhuda Poultry Form - Edit Company')
@section('body-content')

 <!-- MAIN CONTENT-->
 <div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <form class="forms-sample" method="POST" id="update_client" data-id="{{ $client->id }}">
                <div class="card">
                    <div class="card-header"><h4>Add Client</h4></div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col col-6">
                                <div class="form-group">
                                    <label for="client_name">Client Name<font color="red">* </font></label>
                                    <input type="text" class="form-control" name="client_name" id="client_name" value="{{$client->client_name}}">
                                    @error('client_name')
                                        <div class="invalid-feedback {{ isset($message)?'d-block':'' }}">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col col-6">
                                <div class="form-group">
                                    <label for="client_email">Client Email</label>
                                    <input type="email" class="form-control" name="client_email" id="client_email" value="{{ isset($client->client_email)? $client->client_email : '' }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col-6">
                                <div class="form-group">
                                    <label for="">Client Phone<font color="red">* </font></label>
                                    <input type="phone" class="form-control" name="client_phone" id="client_phone" value="{{$client->client_phone}}">
                                    @error('client_phone')
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
                                    <label for="client_address">Client Address<font color="red">* </font></label>
                                    <textarea class="form-control" name="client_address" id="client_address">{{$client->client_address}}</textarea>
                                    @error('client_address')
                                        <div class="invalid-feedback {{ isset($message)?'d-block':'' }}">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div><br>
                    <div class="form-group mx-3">
                        <button type="submit" id="update_client_btn" class="btn btn-outline-primary mr-2">Create</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
 </div>
 @stack('scripts')
 @endsection
 @section('scripts')
 <script src="{{asset('backend/custom/clients/create.js')}}"></script>
@endsection
