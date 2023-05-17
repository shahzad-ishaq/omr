@extends('layouts.master')
@section('title') @lang('translation.Advanced_Plugins') @endsection

@section('css')
    <link href="{{ URL::asset('assets/libs/choices.js/choices.js.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ URL::asset('assets/libs/@simonwep/@simonwep.min.css') }}"/>
    <link rel="stylesheet" href="{{ URL::asset('assets/libs/flatpickr/flatpickr.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/libs/glightbox/glightbox.min.css') }}">
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
                                        <label for="choices-single-default" class="form-label font-size-13 text-muted">Select Campus</label>
                                        <select class="form-control" data-trigger name="institute_id"
                                            id="institute_id" placeholder="Search" onchange="getClass()" required></select>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="mb-3">
                                        <label for="choices-single-default" class="form-label font-size-13 text-muted">Select Class</label>
                                        <select class="form-control" data-trigger name="class_id"
                                            id="class_id" onchange="getSession()"  placeholder="Search" required>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="mb-3">
                                        <label for="choices-single-default" class="form-label font-size-13 text-muted">Select Session</label>
                                        <select class="form-control" data-trigger name="session_id"
                                                id="session_id" onchange="getGroup()" placeholder="Search" required>

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- end row -->
                        <div class="row">
                            <div class="col-lg-4 col-md-6">
                                <div class="mb-3">
                                    <label for="choices-single-default" class="form-label font-size-13 text-muted">Select Groups</label>
                                    <select class="form-control" data-trigger onchange="getSubject()" name="class_groups_id" id="class_groups_id" placeholder="Search">
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="mb-3">
                                    <label for="choices-single-default" class="form-label font-size-13 text-muted">Select Subject</label>
                                    <select class="form-control" data-trigger onchange="getTest()" name="subject_id" id="subject_id"  placeholder="Search">

                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6">
                                <div class="mb-3">
                                    <label for="choices-single-default" class="form-label font-size-13 text-muted">Select Test</label>
                                    <select class="form-control" data-trigger name="test_id"
                                            id="test_id"   placeholder="Search">

                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-lg-4 col-md-6">
                                <div class="mb-3">
                                <div class="fallback">
                                    <input type="file" name="files[]" id="files" multiple="multiple" style="display: none">
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

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                        <div class="col-lg-8 col-md-6">
                        <h4 class="card-title"> UnCheck Bubble Sheet</h4>
                        <p class="card-title-desc">You can click to view the bubble Sheet. For get the result Click on result Button and Wait...</p>
                        </div> <div class="col-lg-4 col-md-6 right">
                            <div class="form-inline float-md-end">
                                <button type="button" class="btn btn-primary btn-success" id="resultCompile" style="display:none">Result</button>
                            </div></div>
                    </div>
                    </div>

                    <div class="card-body">
                        <div class="popup-gallery"  id="imgDiv">

                                {{--<div class="col-xl-2 col-md-4 col-6">
                                    <div class="mt-4">
                                        <a href="assets/images/small/img-1.jpg" class="thumb preview-thumb image-popup">
                                            <div class="img-fluid">
                                                <img src="{{ URL::asset('assets/images/small/img-1.jpg') }}" alt="" class="img-fluid d-block">
                                            </div>
                                        </a>
                                    </div>
                                </div>--}}


                        </div>

                    </div>
                </div>
            </div> <!-- end col -->
        </div>

@endsection
@section('script')
    <script src="{{ URL::asset('assets/js/jquery-3.7.0.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/glightbox/glightbox.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/pages/lightbox.init.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/choices.js/choices.js.min.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/@simonwep/@simonwep.min.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/flatpickr/flatpickr.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/pages/form-result.init.js') }}"></script>

    <script src="{{ URL::asset('assets/js/app.js') }}"></script>

@endsection
