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
                    <h3 class=" text-center pt-3">Mortality</h3>
                </div>
                <div class="card-body">
                    {{-- company view --}}
                    <div id="company" class="">
                        <div class=" mt-2">
                            <table class="table-bordered col-lg-12">
                                <tr>
                                    <td class="font-weight-bold p-2">Company</td>
                                    <td class="p-2">{{isset($mortality['company']['name']) ? $mortality['company']['name'] : ''}}</td>
                                    <td class="font-weight-bold p-2">Shed</td>
                                    <td class="p-2">{{isset($mortality['sheds']['name']) ? $mortality['sheds']['name'] : ''}}</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold p-2">Day Mortality</td>
                                    <td class="p-2">{{isset($mortality->day_mortality) ? $mortality->day_mortality : ''}}</td>
                                    <td class="font-weight-bold p-2">Night Mortality</td>
                                    <td class="p-2">{{isset($mortality->night_mortality) ? $mortality->night_mortality : ''}}</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold p-2">Date</td>
                                    <td class="p-2">{{isset($mortality->date) ? $mortality->date : ''}}</td>

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
