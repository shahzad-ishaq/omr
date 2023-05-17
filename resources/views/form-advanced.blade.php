@extends('layouts.master')
@section('title') @lang('translation.Advanced_Plugins') @endsection

@section('css')
    <link href="{{ URL::asset('assets/libs/choices.js/choices.js.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ URL::asset('assets/libs/@simonwep/@simonwep.min.css') }}"/>
    <link rel="stylesheet" href="{{ URL::asset('assets/libs/flatpickr/flatpickr.min.css') }}">
@endsection
    @section('content')
        @component('components.breadcrumb')
        @slot('li_1') Forms @endslot
        @slot('title') Answer Key Form @endslot
        @endcomponent

        @csrf
        <form id="answerKeyForm" onsubmit="return false;">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="id"  id="id">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                                <div class="col-lg-4 col-md-6">
                                    <div class="mb-3">
                                        <label for="choices-single-default" class="form-label font-size-13 text-muted">Select Campus</label>
                                        <select class="form-control" data-trigger name="institute_id"
                                            id="institute_id" placeholder="Search" onchange="getClass()"></select>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="mb-3">
                                        <label for="choices-single-default" class="form-label font-size-13 text-muted">Select Class</label>
                                        <select class="form-control" data-trigger name="class_id"
                                            id="class_id" onchange="getSession()"  placeholder="Search">

                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="mb-3">
                                        <label for="choices-single-default" class="form-label font-size-13 text-muted">Select Session</label>
                                        <select class="form-control" data-trigger name="session_id"
                                                id="session_id" onchange="getGroup()" placeholder="Search">

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
                                            id="test_id"
                                            placeholder="Search">

                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                                        <div class="col-md-3">
                                            <div class="mt-lg-0">
                                                <label class="form-label" for="form-sm-input">Form 1-25</label>
                                               @for($fc = 1; $fc <= 25; $fc++)
                                                    <div class="d-flex flex-wrap gap-2">
                                                        <label class="form-check-label" for="formRadiosRight{{$fc}}">
                                                            {{$fc}}
                                                        </label>
                                                        <div class="form-check form-check-right mb-3">
                                                            <input class="form-check-input ans{{$fc}}" value="1" type="radio" name="A{{$fc}}"
                                                                   id="ans{{$fc}}">
                                                        </div>
                                                        <div class="form-check form-check-right mb-3">
                                                            <input class="form-check-input ans{{$fc}}" value="2" type="radio" name="A{{$fc}}"
                                                                   id="ans{{$fc}}">
                                                        </div>
                                                        <div class="form-check form-check-right mb-3">
                                                            <input class="form-check-input ans{{$fc}}" value="3" type="radio" name="A{{$fc}}"
                                                                   id="ans{{$fc}}">
                                                        </div>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input ans{{$fc}}" value="4" type="radio" name="A{{$fc}}"
                                                                   id="ans{{$fc}}">

                                                        </div>
                                                    </div>
                                                @endfor

                                            </div>

                                        </div>
                                        <div class="col-md-3">
                                            <div class="mt-lg-0">
                                                <label class="form-label" for="form-sm-input">Form 26-50</label>
                                                @for($fc = 26; $fc <= 50; $fc++)
                                                    <div class="d-flex flex-wrap gap-2">
                                                        <label class="form-check-label" for="formRadiosRight{{$fc}}">
                                                            {{$fc}}
                                                        </label>
                                                        <div class="form-check form-check-right mb-3">
                                                            <input class="form-check-input ans{{$fc}}" value="1" type="radio" name="A{{$fc}}"
                                                                   id="ans{{$fc}}">
                                                        </div>
                                                        <div class="form-check form-check-right mb-3">
                                                            <input class="form-check-input ans{{$fc}}" value="2" type="radio" name="A{{$fc}}"
                                                                   id="ans{{$fc}}">
                                                        </div>
                                                        <div class="form-check form-check-right mb-3">
                                                            <input class="form-check-input ans{{$fc}}" value="3" type="radio" name="A{{$fc}}"
                                                                   id="ans{{$fc}}">
                                                        </div>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input ans{{$fc}}" value="4" type="radio" name="A{{$fc}}"
                                                                   id="ans{{$fc}}">

                                                        </div>
                                                    </div>
                                                @endfor
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mt-lg-0">
                                                <label class="form-label" for="form-sm-input">Form 51-75</label>
                                                @for($fc = 51; $fc <= 75; $fc++)
                                                    <div class="d-flex flex-wrap gap-2">
                                                        <label class="form-check-label" for="formRadiosRight{{$fc}}">
                                                            {{$fc}}
                                                        </label>
                                                        <div class="form-check form-check-right mb-3">
                                                            <input class="form-check-input ans{{$fc}}" value="1" type="radio" name="A{{$fc}}"
                                                                   id="ans{{$fc}}">
                                                        </div>
                                                        <div class="form-check form-check-right mb-3">
                                                            <input class="form-check-input ans{{$fc}}" value="2" type="radio" name="A{{$fc}}"
                                                                   id="ans{{$fc}}">
                                                        </div>
                                                        <div class="form-check form-check-right mb-3">
                                                            <input class="form-check-input ans{{$fc}}" value="3" type="radio" name="A{{$fc}}"
                                                                   id="ans{{$fc}}">
                                                        </div>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input ans{{$fc}}" value="4" type="radio" name="A{{$fc}}"
                                                                   id="ans{{$fc}}">

                                                        </div>
                                                    </div>
                                                @endfor
                                            </div>
                                        </div>
                                        <div class="col-md-3 ms-auto">
                                            <div class="mt-lg-0">
                                                <label class="form-label" for="form-sm-input">Form 76-100</label>
                                                @for($fc = 76; $fc <= 100; $fc++)
                                                    <div class="d-flex flex-wrap gap-2">
                                                        <label class="form-check-label" for="formRadiosRight{{$fc}}">
                                                            {{$fc}}
                                                        </label>
                                                        <div class="form-check form-check-right mb-3">
                                                            <input class="form-check-input ans{{$fc}}" value="1" type="radio" name="A{{$fc}}"
                                                                   id="ans{{$fc}}">
                                                        </div>
                                                        <div class="form-check form-check-right mb-3">
                                                            <input class="form-check-input ans{{$fc}}" value="2" type="radio" name="A{{$fc}}"
                                                                   id="ans{{$fc}}">
                                                        </div>
                                                        <div class="form-check form-check-right mb-3">
                                                            <input class="form-check-input ans{{$fc}}" value="3" type="radio" name="A{{$fc}}"
                                                                   id="ans{{$fc}}">
                                                        </div>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input ans{{$fc}}" value="4" type="radio" name="A{{$fc}}"
                                                                   id="ans{{$fc}}">

                                                        </div>
                                                    </div>
                                                @endfor
                                            </div>
                                        </div>
                            <div>
                                <button id="add_data" type="button" class="btn btn-primary w-md">Save</button>
                            </div>
                                    </div>


                <!-- end card -->
            </div>
            <!-- end col -->
                </div></div>

        </div>


@endsection
@section('script')
    <script src="{{ URL::asset('assets/js/jquery-3.7.0.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/choices.js/choices.js.min.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/@simonwep/@simonwep.min.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/flatpickr/flatpickr.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/pages/form-advanced.init.js') }}"></script>
    <script src="{{ URL::asset('assets/js/app.js') }}"></script>

@endsection
