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
                    <h3 class=" text-center pt-3">Company</h3>
                </div>
                <div class="card-body">
                    {{-- company view --}}
                    <div id="company" class="">
                        <div class=" mt-2">
                            <table class="table-bordered col-lg-12">
                                <tr>
                                    <td class="font-weight-bold p-2">Company Name</td>
                                    <td class="p-2">{{isset($company->name) ? $company->name : ''}}</td>
                                    <td class="font-weight-bold p-2">Status</td>
                                    @if ($company['is_active'] == 1)
                                        <td><div class="badge badge-success">Active</div></td>
                                    @else
                                        <td><div class="badge badge-danger">In-active</div></td>
                                    @endif
                                </tr>
                                <tr>
                                    <td class="font-weight-bold p-2">Address</td>
                                    <td colspan="3" class="p-2">{{isset($company->address) ? $company->address : ''}}</td>
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
