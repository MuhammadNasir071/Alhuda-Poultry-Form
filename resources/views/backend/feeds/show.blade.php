@extends('backend.layouts.master-admin')
@section('title', 'Alhuda Poultry Form - Feed Detail')
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
                    <h3 class=" text-center pt-3">Feeds</h3>
                </div>
                <div class="card-body">
                    {{-- Feeds view --}}
                    <div id="Feeds" class="">
                        <div class=" mt-2">
                            <table class="table-bordered col-lg-12">
                                <tr>
                                    <td class="font-weight-bold p-2">Company</td>
                                    <td class="p-2">{{isset($feed['company']['name']) ? $feed['company']['name'] : ''}}</td>
                                    <td class="font-weight-bold p-2">Shed</td>
                                    <td class="p-2">{{isset($feed['sheds']['name']) ? $feed['sheds']['name'] : ''}}</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold p-2">Day feed</td>
                                    <td class="p-2">{{isset($feed->day_feed) ? $feed->day_feed : ''}}</td>
                                    <td class="font-weight-bold p-2">Night feed</td>
                                    <td class="p-2">{{isset($feed->night_feed) ? $feed->night_feed : ''}}</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold p-2">Date</td>
                                    <td class="p-2">{{isset($feed->date) ? $feed->date : ''}}</td>

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
