@extends('backend.layouts.master-admin')
@section('title', 'Alhuda Poultry Form - Edit Company')
@section('body-content')

 <!-- MAIN CONTENT-->
 <div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <form class="forms-sample" method="POST" id="update_sale" data-id="{{ $sale->id }}">
                <div class="card">
                    <div class="card-header"><h4>Edit Sale</h4></div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col col-4">
                                <div class="form-group">
                                    <label for="vehicle_no">Vehicle No<font color="red">* </font></label>
                                    <input type="text" class="form-control" name="vehicle_no" id="vehicle_no" value="{{$sale->vehicle_no}}">
                                    @error('vehicle_no')
                                        <div class="invalid-feedback {{ isset($message)?'d-block':'' }}">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col col-4">
                                <div class="form-group">
                                    <label for="rate">Rate<font color="red">* </font></label>
                                    <input type="number" class="form-control" name="rate" id="rate" value="{{$sale->rate}}">
                                    @error('rate')
                                        <div class="invalid-feedback {{ isset($message)?'d-block':'' }}">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col col-4">
                                <div class="form-group">
                                    <label for="client_id">Client<font color="red">* </font></label>
                                    <select class="form-control" name="client_id" id="client_id">
                                        @if (isset($clients) && count($clients))
                                            @foreach ($clients as $client)
                                                <option value="{{$client->id}}" {{$client->id == $sale->client_id ? 'selected' : ''}}>{{$client->name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    @error('client_id')
                                        <div class="invalid-feedback {{ isset($message)?'d-block':'' }}">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col-3">
                                <div class="form-group">
                                    <label for="initial_weight">Initial Weight(Kg)<font color="red">* </font></label>
                                    <input type="number" class="form-control" name="initial_weight" id="initial_weight" value="{{$sale->initial_weight}}">
                                    @error('initial_weight')
                                        <div class="invalid-feedback {{ isset($message)?'d-block':'' }}">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col col-3">
                                <div class="form-group">
                                    <label for="final_weight">Final Weight(Kg)<font color="red">* </font></label>
                                    <input type="number" class="form-control" name="final_weight" id="final_weight" value="{{$sale->final_weight}}">
                                    @error('final_weight')
                                        <div class="invalid-feedback {{ isset($message)?'d-block':'' }}">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col col-3">
                                <div class="form-group">
                                    <label for="rate">Rate<font color="red">* </font></label>
                                    <input type="number" class="form-control" name="rate" id="rate" value="{{isset($sale->rate) ? $sale->rate : ''}}">
                                    @error('rate')
                                        <div class="invalid-feedback {{ isset($message)?'d-block':'' }}">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col col-3">
                                <div class="form-group">
                                    <label for="final_price">Final Price</label>
                                    <input type="text" class="form-control" name="final_price" id="final_price" value="{{isset($sale->total_price) ? $sale->total_price : ''}}">
                                    @error('final_price')
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
                                    <label for="payment_type">Payment Type<font color="red">* </font></label>
                                    <select name="payment_type" id="payment_type" class="form-control">
                                        <option value="">Select payment type</option>
                                        <option value="Cash" {{$sale->payment_type == 'Cash' ? 'selected' : '' }}>Cash</option>
                                        <option value="Online" {{$sale->payment_type == 'Online' ? 'selected' : '' }}>Online</option>
                                        <option value="Cheque" {{$sale->payment_type == 'Cheque' ? 'selected' : '' }}>Cheque</option>
                                        <option value="Credit Card" {{$sale->payment_type == 'Credit Card' ? 'selected' : '' }}>Credit Card</option>
                                    </select>
                                    @error('payment_type')
                                        <div class="invalid-feedback {{ isset($message)?'d-block':'' }}">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col col-6">
                                <div class="form-group">
                                    <label for="payment_status">Payment Status<font color="red">* </font></label>
                                    <select name="payment_status" id="payment_status" class="form-control">
                                        <option value="">Select payment status</option>
                                        <option value="Paid" {{$sale->payment_status == 'Paid' ? 'selected' : '' }}>Paid</option>
                                        <option value="Pending" {{$sale->payment_status == 'Pending' ? 'selected' : '' }}>Pending</option>
                                    </select>
                                    @error('payment_status')
                                        <div class="invalid-feedback {{ isset($message)?'d-block':'' }}">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div><br>
                    <div class="form-group mx-3">
                        <button type="submit" id="update_sale_btn" class="btn btn-outline-primary mr-2">Update</button>
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
 <script src="{{asset('backend/custom/sales/create.js')}}"></script>
@endsection
