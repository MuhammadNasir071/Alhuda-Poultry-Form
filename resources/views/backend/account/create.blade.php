@extends('backend.layouts.master-admin')
@section('body-content')

 <!-- MAIN CONTENT-->
 <div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <form id="add_property_form" method="post">
                <div class="card">
                    <div class="card-header"><h4>Add Property</h4></div>
                    <div class="card-body">
                        <div class="cart-title mb-2"><h5>Property Description</h5></div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="title" class="control-label mb-1">Title<font color="red">*</font></label>
                                    <input type="text" id="title" name="title"  class="form-control">
                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="status" class="control-label mb-1">Status<font color="red">*</font></label>
                                    <select name="status" class="form-control" id="status">
                                        <option value="LEASE">LEASE</option>
                                        <option value="OWNER">OWNER</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col col-3">
                                <div class="form-group">
                                    <label for="listed_in" class="control-label mb-1">Listed In<font color="red">*</font></label>
                                    <select name="listed_in"  class="form-control" id="listed_in">
                                        <option value="Hot">Hot</option>
                                        <option value="Super Hot">Super Hot</option>
                                        <option value="Normal">Normal</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col-6">
                                <div class="form-group">
                                    <label for="category" class="control-label mb-1">Category<font color="red">*</font></label>
                                    <select name="category" id="category" class="form-control">
                                        <option value="House">House</option>
                                        <option value="Flat">Flat</option>
                                        <option value="Upper Portion">Upper Portion</option>
                                        <option value="Lower Portion">Lower Portion</option>
                                        <option value="Farm House">Farm House</option>
                                        <option value="Room">Room</option>
                                        <option value="Penthouse">Penthouse</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col col-6">
                                <div class="form-group pb-3">
                                    <label for="price" class="control-label mb-1">Price in Rs. (only numbers)<font color="red">*</font></label>
                                    <input type="number" name="price" id="price" class="form-control">
                                    @error('price')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="cart-title my-3"><h5>Listing Location</h5></div>
                        <div class="row">
                            <div class="col col-4">
                                <div class="form-group">
                                    <label for="country" class="control-label mb-1">Country<font color="red">*</font></label>
                                    <input type="text" name="country" id="country" class="form-control" value="Pakistan" readonly>
                                </div>
                            </div>
                            <div class="col col-4">
                                <div class="form-group mt-1">
                                    <label for="state" class="control-label mb-1">State<font color="red">*</font></label>
                                    <select name="state" id="state" class="form-control">
                                        <option value="Punjab">Punjab</option>
                                        <option value="Sindh">Sindh</option>
                                        <option value="Khyber Pakhtunkhwa">Khyber Pakhtunkhwa</option>
                                        <option value="Balochistan">Balochistan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col col-4">
                                <div class="form-group">
                                    <label for="city" class="control-label mb-1">City<font color="red">*</font></label>
                                    <input type="text" name="city" id="city" class="form-control" required>
                                    @error('state')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col-4">
                                <div class="form-group">
                                    <label for="apartment" class="control-label mb-1">Apartment (optional)</label>
                                    <input type="text" name="apartment"  class="form-control" id="apartment">
                                </div>
                            </div>
                            <div class="col col-8">
                                <div class="form-group">
                                    <label for="address" class="control-label mb-1">Address<font color="red">*</font></label>
                                    <textarea type="text" name="address" id="address" class="form-control" required></textarea>
                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col-4">
                                <img class="mb-2" width="170px" id="imagePreview" src="{{ asset('backend/images/placeholder_image.png') }}">
                                <div class="form-group">
                                    <input id="upload-photo" name="image" type="file" onchange="loadFile(event)" accept="image/*">
                                </div>
                            </div>
                        </div><br>

                        <div class="row">
                            <div class="col col-12" wire:ignore>
                                <div class="form-group">
                                    <label for="description">{{__('Property Description')}}<font color="red">*</font></label>
                                    <textarea type="text" class="form-control" name="description" rows="4" id="description"></textarea>
                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="card-body">
                        <div class="cart-title my-3"><h5>Listing Details</h5></div>
                        <div class="row">
                            <div class="col col-4">
                                <div class="form-group">
                                    <label for="size_square_meter" class="control-label mb-1">Size in m2 (only numbers)<font color="red">*</font></label>
                                    <input type="number" id="size_square_meter" name="size_square_meter"  class="form-control" required>
                                    @error('size_square_meter')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col col-4">
                                <div class="form-group">
                                    <label for="lot_size" class="control-label mb-1">Lot Size in m2 (only numbers)<font color="red">*</font></label>
                                    <input type="number" name="lot_size" id="lot_size" class="form-control">
                                    @error('lot_size')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col col-4">
                                <div class="form-group">
                                    <label for="rooms" class="control-label mb-1">Rooms (only numbers)</label>
                                    <input type="number" name="rooms" id="rooms" class="form-control">
                                </div>
                            </div>
                            <div class="col col-4">
                                <div class="form-group">
                                    <label for="kitchen" class="control-label mb-1">Kitchen</label>
                                    <input type="text" name="kitchen" id="kitchen" class="form-control">
                                </div>
                            </div>
                            <div class="col col-4">
                                <div class="form-group">
                                    <label for="bedrooms" class="control-label mb-1">Bedrooms (only numbers)</label>
                                    <input type="number" id="bedrooms" name="bedrooms" class="form-control">
                                </div>
                            </div>
                            <div class="col col-4">
                                <div class="form-group">
                                    <label for="bathrooms" class="control-label mb-1">Bathrooms (only numbers)</label>
                                    <input type="number" name="bathrooms" id="bathrooms" class="form-control">
                                </div>
                            </div>
                            <div class="col col-4">
                                <div class="form-group">
                                    <label for="build_date" class="control-label mb-1">Year Built (date)<font color="red">*</font></label>
                                    <input type="date" name="build_date" id="build_date" class="form-control" required>
                                    @error('build_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col col-4">
                                <div class="form-group">
                                    <label for="garages" class="control-label mb-1">Garages</label>
                                    <select id="garages" name="garages"  class="form-control">
                                        <option value="Not">Not Available</option>
                                        <option value="One">One</option>
                                        <option value="Two">Two</option>
                                        <option value="Three">Three</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col col-4">
                                <div class="form-group">
                                    <label for="bathrooms" class="control-label mb-1">Garage Size</label>
                                    <select id="garage_size" name="garage_size"  class="form-control">
                                        <option value="Not">Not Available</option>
                                        <option value="One Car">One Car</option>
                                        <option value="Two Car">Two Car</option>
                                        <option value="Three Car">Three Car</option>>
                                    </select>
                                </div>
                            </div>
                            <div class="col col-4">
                                <div class="form-group">
                                    <label for="available_date" class="control-label mb-1">Available from (date)<font color="red">*</font></label>
                                    <input type="date" name="available_date" id="available_date" class="form-control" required>
                                    @error('available_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col col-4">
                                <div class="form-group">
                                    <label for="basement" class="control-label mb-1">Basement (text)</label>
                                    <input type="text" id="basement" name="basement" class="form-control">
                                </div>
                            </div>
                            <div class="col col-4">
                                <div class="form-group">
                                    <label for="roofing" class="control-label mb-1">Roofing (text)</label>
                                    <input type="text" id="roofing" name="roofing" class="form-control">
                                </div>
                            </div>
                            <div class="col col-4">
                                <div class="form-group">
                                    <label for="external_construction" class="control-label mb-1">External construction (text)</label>
                                    <input type="text" name="external_construction" id="external_construction" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr>
                    <div class="card-body pb-5">
                        <div class="cart-title my-3">
                            <h5>Amenities and Features</h5>
                        </div>
                        <div class="cart-title"><h6>Outdoor Details/</h6></div>
                        <div class="row">
                            <div class="col col-3">
                                <div class="form-group">
                                    <input type="checkbox" id="balcony" name="balcony" value="1" class="mr-3">
                                    <label for="balcony" class="form-check-label">Balcony?</label>
                                </div>
                            </div>
                            <div class="col col-3">
                                <div class="form-group">
                                    <input type="checkbox" id="garden" name="garden" value="1" class="mr-3">
                                    <label for="garden" class="form-check-label">Garden?</label>
                                </div>
                            </div>
                            <div class="col col-3">
                                <div class="form-group">
                                    <input type="checkbox" id="chair_accessible" name="chair_accessible" value="1" class="mr-3">
                                    <label for="chair_accessible" class="form-check-label">Chair Accessible?</label>
                                </div>
                            </div>
                            <div class="col col-3">
                                <div class="form-group">
                                    <input type="checkbox" id="doorman" name="doorman" value="1" class="mr-3">
                                    <label for="doorman" class="form-check-label">Doorman?</label>
                                </div>
                            </div>
                            <div class="col col-3">
                                <div class="form-group">
                                    <input type="checkbox" id="elevator" name="elevator" value="1" class="mr-3">
                                    <label for="elevator" class="form-check-label">Elevator?</label>
                                </div>
                            </div>
                            <div class="col col-3">
                                <div class="form-group">
                                    <input type="checkbox" id="front_yard" name="front_yard" value="1" class="mr-3">
                                    <label for="front_yard" class="form-check-label">Front Yard?</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mx-3">
                        <button type="submit" id="add_property_btn" class="btn btn-outline-info">Add property</button>
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
 <script src="{{asset('backend/custom/properties/create.js')}}"></script>
@endsection
