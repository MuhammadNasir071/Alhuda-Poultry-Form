@extends('backend.layouts.master-admin')
@section('title', 'Alhuda Poultry Form - Add Company')
@section('body-content')

 <!-- MAIN CONTENT-->
 <div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <form class="forms-sample" method="POST" id="add_sale">
                <div class="card">
                    <div class="card-header"><h4>Add Sale</h4></div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col col-6">
                                <div class="form-group">
                                    <label for="sheds">Company<font color="red">* </font></label>
                                    <select name="company_id" id="company_id" class="form-control">
                                        <option value="" selected>Select a company</option>
                                        @if(isset($companies) && !is_null($companies))
                                            @foreach ($companies as $company)
                                                <option value="{{$company->id}}">{{$company->name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    @error('company_id')
                                        <div class="invalid-feedback {{ isset($message)?'d-block':'' }}">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col col-6" id="child_shed_div" style="display:none">
                                <div class="form-group">
                                    <label for="sheds">Please select a shed<font color="red">* </font></label>
                                    <select name="shed_id" id="shed_id" class="form-control">
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col-6">
                                <div class="form-group">
                                    <label for="clients">Client<font color="red">* </font></label>
                                    <select name="client_id" id="client_id" class="form-control">
                                        <option value="" selected>Select a client</option>
                                        @if(isset($clients) && !is_null($clients))
                                            @foreach ($clients as $client)
                                                <option value="{{$client->id}}">{{$client->name}}</option>
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
                            <div class="col col-6">
                                <div class="form-group">
                                    <label for="vehicle_no">Vehicle No<font color="red">* </font></label>
                                    <input type="text" class="form-control" name="vehicle_no" id="vehicle_no">
                                    @error('vehicle_no')
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
                                    <input type="number" class="form-control" name="initial_weight" id="initial_weight">
                                    @error('initial_weight')
                                        <div class="invalid-feedback {{ isset($message)?'d-block':'' }}">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col col-3">
                                <div class="form-group">
                                    <label for="final_weight">Final Weight(Kg)</label>
                                    <input type="number" class="form-control" name="final_weight" id="final_weight">
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
                                    <input type="number" class="form-control" name="rate" id="rate">
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
                                    <input type="text" class="form-control" name="final_price" id="final_price">
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
                                        <option value="" selected>Select payment type</option>
                                        <option value="Cash">Cash</option>
                                        <option value="Online">Online</option>
                                        <option value="Cheque">Cheque</option>
                                        <option value="Credit Card">Credit Card</option>
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
                                        <option value="" selected>Select payment status</option>
                                        <option value="Paid">Paid</option>
                                        <option value="Pending">Pending</option>
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
                        <button type="submit" id="add-sale_button" class="btn btn-outline-primary mr-2">Create</button>
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
