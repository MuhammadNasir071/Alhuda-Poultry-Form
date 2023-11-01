@extends('backend.layouts.master-admin')
@section('title', 'Alhuda Poultry Form - Add Company')
@section('body-content')

 <!-- MAIN CONTENT-->
 <div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <form class="forms-sample" method="POST" id="add_mortality">
                <div class="card">
                    <div class="card-header"><h4>Add Mortality</h4></div>
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
                                    <label for="day_mortality">Day Mortality<font color="red">* </font></label>
                                    <input type="number" class="form-control" name="day_mortality" id="day_mortality">
                                    @error('day_mortality')
                                        <div class="invalid-feedback {{ isset($message)?'d-block':'' }}">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col col-6">
                                <div class="form-group">
                                    <label for="night_mortality">Night Mortality<font color="red">* </font></label>
                                    <input type="number" class="form-control" name="night_mortality" id="night_mortality">
                                    @error('night_mortality')
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
                    </div><br>
                    <div class="form-group mx-3">
                        <button type="submit" id="add-mortality_button" class="btn btn-outline-primary mr-2">Create</button>
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
 <script src="{{asset('backend/custom/mortalities/create.js')}}"></script>
@endsection
