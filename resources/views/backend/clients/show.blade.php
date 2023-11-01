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
                    <h3 class=" text-center pt-3">Client</h3>
                </div>
                <div class="card-body">
                    {{-- expense view --}}
                    <div id="expense" class="">
                        <div class=" mt-2">
                            <table class="table-bordered col-lg-12">
                                <tr>
                                    <td class="font-weight-bold p-2">Name</td>
                                    <td class="p-2">{{isset($client->name) ? $client->name : ''}}</td>
                                    <td class="font-weight-bold p-2">Email</td>
                                    <td class="p-2">{{isset($client->email) ? $client->email : ''}}</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold p-2">Phone</td>
                                    <td class="p-2">{{isset($client->phone) ? $client->phone : ''}}</td>
                                    <td class="font-weight-bold p-2">Address</td>
                                    <td class="p-2">{{isset($client->address) ? $client->address : ''}}</td>
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
