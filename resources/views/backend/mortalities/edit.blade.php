@extends('backend.layouts.master-admin')
@section('title', 'Alhuda Poultry Form - Edit Company')
@section('body-content')

 <!-- MAIN CONTENT-->
 <div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <form id="update_mortality" method="post" data-id="{{ $mortality->id }}">
                <input type="text" name="shed_id" id="shed_id" hidden value="{{ $mortality->shed_id }}">
                <div class="card">
                    <div class="card-header"><h4>Edit Mortality</h4></div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col col-6">
                                <div class="form-group">
                                    <label for="day_mortality">Day Mortality<font color="red">* </font></label>
                                    <input type="number" class="form-control" name="day_mortality" id="day_mortality" value="{{ $mortality->day_mortality }}">
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
                                    <input type="number" class="form-control" name="night_mortality" id="night_mortality" value="{{ $mortality->night_mortality }}">
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
                                    <input type="date" class="form-control" name="date" id="date" value="{{ $mortality->date }}">
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
                        <button type="submit" id="update_mortality_btn" class="btn btn-outline-primary mr-2">Update</button>
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
