@extends('layouts.master')
@section('title') @lang('translation.Vector_Maps') @endsection

@section('css')
    <link href="{{ URL::asset('assets/libs/jsvectormap/jsvectormap.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    @component('components.breadcrumb')
    @slot('li_1') Maps @endslot
    @slot('title') Vector Maps @endslot
    @endcomponent

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title mb-0">World Vector Map</h4>
                        </div><!-- end card header -->
                    <div class="card-body">
                        <div id="world-map-line-markers" style="height: 420px"></div>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col-->
        </div>

        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title mb-0">World Vector Map with Markers</h4>
                    </div><!-- end card header -->

                    <div class="card-body">
                        <div id="world-map-markers" style="height: 350px"></div>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col-->

            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title mb-0">World Vector Map with Image Markers</h4>
                    </div><!-- end card header -->
                    <div class="card-body">
                        <div id="world-map-markers-image"  style="height: 350px"></div>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col-->
        </div>

        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title mb-0">USA Vector Map</h4>
                    </div>
                    <div class="card-body">
                        <div id="usa-vectormap" style="height: 350px"></div>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col-->

            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title mb-0">Canada Vector Map</h4>
                    </div>
                    <div class="card-body">
                        <div id="canada-vectormap"  style="height: 350px"></div>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col-->
        </div>

@endsection
@section('script')
    <script src="{{ URL::asset('assets/libs/jsvectormap/jsvectormap.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/pages/vector-maps.init.js') }}"></script>
    <script src="{{ URL::asset('assets/js/app.js') }}"></script>
@endsection
