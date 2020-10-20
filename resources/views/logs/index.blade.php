@extends('surveillance-ui::layouts.master')

@section('title', __('surveillance-ui::app.logs.sidebar_title'))


@push('view-styles')
<link href="{{ asset('surveillance-ui/css/datatable/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endpush

@push('view-scripts')
<script src="{{ asset('surveillance-ui/js/datatable/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('surveillance-ui/js/datatable/dataTables.bootstrap4.min.js') }}"></script>
@include('surveillance-ui::logs.partials.datatable_scripts')
@endpush

@section('sidebar')
@parent
@endsection

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h5 mb-0 text-gray-800">{{ __('surveillance-ui::app.logs.page_heading') }}</h1>
        @include('surveillance-ui::logs.partials.flash_alert')
    </div>
    <!-- Content Row -->
    <div class="row">
        <!-- Content Column -->
        <div class="col-lg-12 mb-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <span>Filters</span>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="text-center table table-bordered" id="logs_listing" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>{{ __('surveillance-ui::app.logs.fields.id') }}</th>
                                    <th>{{ __('surveillance-ui::app.logs.fields.ip') }}</th>
                                    <th>{{ __('surveillance-ui::app.logs.fields.userid') }}</th>
                                    <th>{{ __('surveillance-ui::app.logs.fields.fingerprint') }}</th>
                                    <th>{{ __('surveillance-ui::app.logs.fields.url') }}</th>
                                    <th>{{ __('surveillance-ui::app.logs.fields.created_at') }}</th>
                                    <th>{{ __('surveillance-ui::app.logs.actions') }}</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>{{ __('surveillance-ui::app.logs.fields.id') }}</th>
                                    <th>{{ __('surveillance-ui::app.logs.fields.ip') }}</th>
                                    <th>{{ __('surveillance-ui::app.logs.fields.userid') }}</th>
                                    <th>{{ __('surveillance-ui::app.logs.fields.fingerprint') }}</th>
                                    <th>{{ __('surveillance-ui::app.logs.fields.url') }}</th>
                                    <th>{{ __('surveillance-ui::app.logs.fields.created_at') }}</th>
                                    <th>{{ __('surveillance-ui::app.logs.actions') }}</th>
                                </tr>
                            </tfoot>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection