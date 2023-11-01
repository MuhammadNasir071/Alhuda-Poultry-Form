@extends('backend.layouts.master-admin')
@section('title', 'Alhuda Poultry Form - Motality Weekly Report')
@section('body-content')

 <!-- MAIN CONTENT-->
 <div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <form class="forms-sample" method="POST" action="{{route('admin.mortality.view.history')}}">
                <div class="card">
                    @csrf
                    <div class="card-header"><h4>Mortality Weekly Report</h4></div>
                    <div class="card-body">
                        <div class="row">
                            <div class="title m-3"><strong>Note: </strong>Please select a company and provide the sheds for viewing the weekly mortality report.</div>
                            <div class="col col-6">
                                <div class="form-group">
                                    <label for="sheds">Company<font color="red">* </font></label>
                                    <select name="company_id_history" id="company_id_history" class="form-control">
                                        <option value="" selected>Select a company</option>
                                        @if(isset($companies) && !is_null($companies))
                                            @foreach ($companies as $company)
                                                <option value="{{$company->id}}">{{$company->name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    @error('company_id_history')
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
                                    @error('shed_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                </div>
                            </div>
                        </div>

                    </div><br>
                    <div class="form-group mx-3">
                        <button type="submit" class="btn btn-outline-primary mr-2">View</button>
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
@endsection
