@extends('layouts.master')
@section('title') @lang('translation.Advanced_Plugins') @endsection

@section('css')
    <link href="{{ URL::asset('assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
    @section('content')
        @component('components.breadcrumb')
        @slot('li_1') Forms @endslot
        @slot('title') Answer Key Form @endslot
        @endcomponent

        @csrf
        <form id="ImgUploadForm" onsubmit="return false;" action="javascript:void(0)" accept-charset="utf-8" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="id"  id="id">
            <input type="hidden" name="ansKeyId"  id="ansKeyId">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                                <div class="col-lg-4 col-md-6">
                                    <div class="mb-3">
                                        <label for="choices-single-default" class="form-label font-size-13 text-muted">Select Institute</label>
                                        <select class="form-control" data-trigger name="institute_id" onchange="getTest()"
                                            id="institute_id" placeholder="Search" required></select>
                                    </div>
                                </div>


                                <div class="col-lg-4 col-md-6">
                                    {{--<div class="mb-3">
                                <label class="form-label" for="productname">Test Name</label>
                                <input id="test" name="productname" placeholder="Enter Test Name" type="text" class="form-control">
                            </div>--}}
                                    <div class="mb-3">
                                        <label for="choices-single-default" class="form-label font-size-13 text-muted">Select Test</label>
                                        <select class="form-control" data-trigger name="test_id"
                                                id="test_id"   placeholder="Search">

                                        </select>
                                    </div>
                                </div>

                            </div>
                        <!-- end row -->

                        <div class="row ">
                            <div class="col-lg-4 col-md-6">
                                <div class="mb-3">
                                <div class="fallback">
                                    <input type="file" name="image[]" id="files" multiple="multiple">
                                </div>
                                </div></div>
                            <div class="col-lg-4 col-md-6">
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary" id="submit">Submit</button>
                                </div></div>
                            </div>

                        </div>

                <!-- end card -->
            </div>
            <!-- end col -->
                </div>
        </div>
        </form>


@endsection
@section('script')
    <script src="{{ URL::asset('assets/js/jquery-3.7.0.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/pages/uploadAnsFile.js') }}"></script>
    <script src="{{ URL::asset('assets/js/app.js') }}"></script>

@endsection
