@extends('surveillance-ui::layouts.master')

@section('title', __('surveillance-ui::app.logs.sidebar_title'))


@push('view-styles')
<link href="{{ asset('surveillance-ui/css/datatable/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endpush

@push('view-scripts')
<script src="{{ asset('surveillance-ui/js/datatable/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('surveillance-ui/js/datatable/dataTables.bootstrap4.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#logs_listing').DataTable({});
    });
</script>
@endpush

@section('sidebar')
@parent
@endsection

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h5 mb-0 text-gray-800">{{ __('surveillance-ui::app.logs.page_heading') }}</h1>
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
                                    <th>{{ __('surveillance-ui::app.logs.fields.fingerprint') }}</th>
                                    <th>{{ __('surveillance-ui::app.logs.fields.userid') }}</th>
                                    <th>{{ __('surveillance-ui::app.logs.fields.ip') }}</th>
                                    <th>{{ __('surveillance-ui::app.logs.fields.url') }}</th>
                                    <th>{{ __('surveillance-ui::app.logs.fields.created_at') }}</th>
                                    <th>{{ __('surveillance-ui::app.logs.actions') }}</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Fingerprint</th>
                                    <th>User ID</th>
                                    <th>IP Address</th>
                                    <th>Visited URL</th>
                                    <th>Timestamp</th>
                                    <th>Actions</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>FDfdt345fgdfgdf</td>
                                    <td>3323</td>
                                    <td>127.0.0.1</td>
                                    <td>http://localhost:8000/surveillance/ui/logs</td>
                                    <td>2020-10-14 01:09:07</td>
                                    <td>
                                        <a href="{{ route('surveillance-ui.logs.show',1) }}" class="btn btn-primary btn-sm">Complete Log</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>FDfdt345fgdfgdf</td>
                                    <td>3323</td>
                                    <td>127.0.0.1</td>
                                    <td>http://localhost:8000/surveillance/ui/logs</td>
                                    <td>2020-10-14 01:09:07</td>
                                    <td>
                                        <a href="{{ route('surveillance-ui.logs.show',2) }}" class="btn btn-primary btn-sm">Complete Log</a>
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
@endsection