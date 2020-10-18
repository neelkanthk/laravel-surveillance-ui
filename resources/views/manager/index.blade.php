@extends('surveillance-ui::layouts.master')

@section('title', __('surveillance-ui::app.manager.sidebar_title'))


@push('view-styles')
<link href="{{ asset('surveillance-ui/css/datatable/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endpush

@push('view-scripts')
<script src="{{ asset('surveillance-ui/js/datatable/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('surveillance-ui/js/datatable/dataTables.bootstrap4.min.js') }}"></script>
@endpush

@section('sidebar')
@parent
@endsection

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h5 mb-0 text-gray-800">{{ __('surveillance-ui::app.manager.page_heading') }}</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <!-- Content Column -->
        <div class="col-lg-12 mb-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <span>Filters</span>
                    <a href="{{ route('surveillance-ui.manager.create') }}" class="float-right btn btn-success btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">{{ __('surveillance-ui::app.manager.create') }}</span>
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="text-center table table-bordered" id="manager_listing" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>{{ __('surveillance-ui::app.manager.fields.type') }}</th>
                                    <th>{{ __('surveillance-ui::app.manager.fields.value') }}</th>
                                    <th>{{ __('surveillance-ui::app.manager.fields.status') }}</th>
                                    <th>{{ __('surveillance-ui::app.manager.actions') }}</th>
                                </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                    <th>{{ __('surveillance-ui::app.manager.fields.type') }}</th>
                                    <th>{{ __('surveillance-ui::app.manager.fields.value') }}</th>
                                    <th>{{ __('surveillance-ui::app.manager.fields.status') }}</th>
                                    <th>{{ __('surveillance-ui::app.manager.actions') }}</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <tr>
                                    <td>IP</td>
                                    <td>127.0.0.1</td>
                                    <td>
                                        <span class="badge badge-secondary">{{ __('surveillance-ui::app.surveillance_status.enable') }}</span>
                                        <span class="badge badge-info">{{ __('surveillance-ui::app.surveillance_status.block') }}</span>
                                    </td>
                                    <td>
                                        <a title="{{ __('surveillance-ui::app.manager.detail') }}" href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target=".showManagerDetailModal"><i class="fa fa-eye"></i></a>
                                        <a title="{{ __('surveillance-ui::app.manager.update') }}" href="#" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                                        <a title="{{ __('surveillance-ui::app.manager.delete') }}" href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target=".deleteManagerModal"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>IP</td>
                                    <td>192.0.0.1</td>
                                    <td>
                                        <span class="badge badge-secondary">{{ __('surveillance-ui::app.surveillance_status.enable') }}</span>
                                        <span class="badge badge-info">{{ __('surveillance-ui::app.surveillance_status.block') }}</span>
                                    </td>
                                    <td>
                                        <a title="{{ __('surveillance-ui::app.manager.detail') }}" href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target=".showManagerDetailModal"><i class="fa fa-eye"></i></a>
                                        <a title="{{ __('surveillance-ui::app.manager.update') }}" href="#" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                                        <a title="{{ __('surveillance-ui::app.manager.delete') }}" href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target=".deleteManagerModal"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@include('surveillance-ui::manager.show')
@include('surveillance-ui::manager.delete')
@endsection