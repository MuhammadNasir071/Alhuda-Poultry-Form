@extends('backend.layouts.master-admin')
@section('title', 'Alhuda Poultry Form - Edit Company')
@section('body-content')

 <!-- MAIN CONTENT-->
 <div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <form class="forms-sample" method="POST" id="update_expense" data-id="{{ $expense->id }}">
                <input type="text" name="shed_id" id="shed_id" hidden value="{{ $expense->shed_id }}">
                <div class="card">
                    <div class="card-header"><h4>Edit Expense</h4></div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col col-6">
                                <div class="form-group">
                                    <label for="invoice_no">Invoice No<font color="red">* </font></label>
                                    <input type="text" class="form-control" name="invoice_no" id="invoice_no" value="{{$expense->invoice_no}}">
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
                                    <input type="text" class="form-control" name="agency" id="agency" value="{{$expense->agency}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col-6">
                                <div class="form-group">
                                    <label for="quantity">Quantity</label>
                                    <input type="number" class="form-control" name="quantity" id="quantity" value="{{$expense->quantity}}">
                                </div>
                            </div>
                            <div class="col col-6">
                                <div class="form-group">
                                    <label for="quantity_type">Quantity Type</label>
                                    <input type="text" class="form-control" name="quantity_type" id="quantity_type" value="{{$expense->quantity_type}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col-3">
                                <div class="form-group">
                                    <label for="price">Price<font color="red">* </font></label>
                                    <input type="number" class="form-control" name="price" id="price" value="{{$expense->price}}">
                                    @error('price')
                                        <div class="invalid-feedback {{ isset($message)?'d-block':'' }}">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col col-3">
                                <div class="form-group">
                                    <label for="date">Date<font color="red">* </font></label>
                                    <input type="date" class="form-control" name="date" id="date" value="{{$expense->date}}">
                                    @error('date')
                                        <div class="invalid-feedback {{ isset($message)?'d-block':'' }}">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col col-6">
                                <div class="form-group">
                                    <label for="expense_type">Expense Type<font color="red">* </font></label>
                                    <select class="form-control" name="expense_type" id="expense_type" value="{{$expense->expense_type}}">
                                        <option value="" selected>Select an expense type</option>
                                        @if(isset($expensetypes) && !is_null($expensetypes))
                                            @foreach ($expensetypes as $expensetype)
                                                <option value="{{$expensetype->id}}" {{$expensetype->id == $expense->expense_type_id ? 'selected' : ''}}>{{$expensetype->name}}</option>
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
                        </div>
                        <div class="row">
                            <div class="col col-12">
                                <div class="form-group">
                                    <label for="expense_detail">Expense Detail<font color="red">* </font></label>
                                    <textarea class="form-control" name="expense_detail" id="expense_detail">{{$expense->expense_detail}}</textarea>
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
                        <button type="submit" id="update_expense_btn" class="btn btn-outline-primary mr-2">Update</button>
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
