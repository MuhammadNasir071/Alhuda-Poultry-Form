@extends('backend.layouts.master-admin')
@section('title', 'Alhuda Poultry Form - Company Detail')
@section('body-content')

<style>
    .font-weight-bold{
        /* color: red; */
    }
</style>
 <!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-title">
                    <h3 class=" text-center pt-3">Shed</h3>
                </div>
                <div class="card-body">
                    {{-- company view --}}
                    <div id="company" class="">
                        <div class=" mt-2">
                            <table class="table-bordered col-lg-12">
                                <tr>
                                    <td width="20%" class="font-weight-bold p-2">Shed Name</td>
                                    <td width="30%" class="p-2">{{isset($shed->name) ? $shed->name : ''}}</td>
                                    <td width="20%" class="font-weight-bold p-2">Status</td>
                                    @if ($shed['is_active'] == 1)
                                        <td width="30%"><div class="badge badge-success">Active</div></td>
                                    @else
                                        <td width="30%"><div class="badge badge-danger">In-active</div></td>
                                    @endif
                                </tr>
                                <tr>
                                    <td width="30%" class="font-weight-bold p-2">Price</td>
                                    <td class="p-2">{{isset($shed->price) ? $shed->price : ''}}</td>
                                    <td width="30%" class="font-weight-bold p-2">Quantity</td>
                                    <td class="p-2">{{isset($shed->quantity) ? $shed->quantity : ''}}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@stack('scripts')
@endsection
@section('scripts')
@endsection
