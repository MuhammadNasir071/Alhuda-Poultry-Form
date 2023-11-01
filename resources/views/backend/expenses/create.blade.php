@extends('backend.layouts.master-admin')
@section('title', 'Alhuda Poultry Form - Add Company')
@section('body-content')

 <!-- MAIN CONTENT-->
 <div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <form class="forms-sample" method="POST" id="add_expense">
                <div class="card">
                    <div class="card-header"><h4>Add Expense</h4></div>
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
                                    <label for="invoice_no">Invoice No<font color="red">* </font></label>
                                    <input type="text" class="form-control" name="invoice_no" id="invoice_no">
                                    @error('invoice_no')
                                        <div class="invalid-feedback {{ isset($message)?'d-block':'' }}">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col col-6">
                                <div class="form-group">
                                    <label for="agency">Agency</label>
                                    <input type="text" class="form-control" name="agency" id="agency">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col-6">
                                <div class="form-group">
                                    <label for="quantity">Quantity</label>
                                    <input type="number" class="form-control" name="quantity" id="quantity">
                                </div>
                            </div>
                            <div class="col col-6">
                                <div class="form-group">
                                    <label for="quantity_type">Quantity Type</label>
                                    <input type="text" class="form-control" name="quantity_type" id="quantity_type">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col-6">
                                <div class="form-group">
                                    <label for="price">Price<font color="red">* </font></label>
                                    <input type="number" class="form-control" name="price" id="price">
                                    @error('price')
                                        <div class="invalid-feedback {{ isset($message)?'d-block':'' }}">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col col-6">
                                <div class="form-group">
                                    <label for="date">Date<font color="red">* </font></label>
                                    <input type="date" class="form-control" name="date" id="date">
                                    @error('date')
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
                                    <label for="expense_type">Expense Type<font color="red">* </font></label>
                                    <select name="expense_type" id="expense_type" class="form-control">
                                        <option value="" selected>Select an expense</option>
                                        @if(isset($expensetypes) && !is_null($expensetypes))
                                            @foreach ($expensetypes as $expensetype)
                                                <option value="{{$expensetype->id}}">{{$expensetype->name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    @error('expense_type')
                                        <div class="invalid-feedback {{ isset($message)?'d-block':'' }}">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col col-6">
                                <div class="form-group">
                                    <label for="expense_detail">Expense Detail<font color="red">* </font></label>
                                    <textarea class="form-control" name="expense_detail" id="expense_detail"></textarea>
                                    @error('expense_detail')
                                        <div class="invalid-feedback {{ isset($message)?'d-block':'' }}">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div><br>
                    <div class="form-group mx-3">
                        <button type="submit" id="add-expense_button" class="btn btn-outline-primary mr-2">Create</button>
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
 <script src="{{asset('backend/custom/expenses/create.js')}}"></script>
@endsection
