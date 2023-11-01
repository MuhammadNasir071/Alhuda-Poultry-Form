@extends('backend.layouts.master-admin')
@section('title', 'Alhuda Poultry Form - Edit Feed')
@section('body-content')

 <!-- MAIN CONTENT-->
 <div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <form id="update_feed" method="post" data-id="{{ $feed->id }}">
                <input type="text" name="shed_id" id="shed_id" hidden value="{{ $feed->shed_id }}">
                <div class="card">
                    <div class="card-header"><h4>Edit feed</h4></div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col col-6">
                                <div class="form-group">
                                    <label for="day_feed">Day Feed<font color="red">* </font></label>
                                    <input type="number" class="form-control" name="day_feed" id="day_feed" value="{{ $feed->day_feed }}">
                                    @error('day_feed')
                                        <div class="invalid-feedback {{ isset($message)?'d-block':'' }}">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col col-6">
                                <div class="form-group">
                                    <label for="night_feed">Night Feed<font color="red">* </font></label>
                                    <input type="number" class="form-control" name="night_feed" id="night_feed" value="{{ $feed->night_feed }}">
                                    @error('night_feed')
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
                                    <input type="date" class="form-control" name="date" id="date" value="{{ $feed->date }}">
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
                        <button type="submit" id="update_feed_btn" class="btn btn-outline-primary mr-2">Update</button>
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
 <script src="{{asset('backend/custom/feeds/create.js')}}"></script>
@endsection
