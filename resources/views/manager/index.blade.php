@extends('surveillance-ui::layouts.master')

@section('title', __('surveillance-ui::app.manager.sidebar_title'))


@push('view-styles')
<link href="{{ asset('surveillance-ui/css/datatable/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endpush

@push('view-scripts')
<script src="{{ asset('surveillance-ui/js/datatable/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('surveillance-ui/js/datatable/dataTables.bootstrap4.min.js') }}"></script>
<script>
    $(document).ready(function() {
        var surveillance_manager_dt = $('#manager_listing').DataTable({
            processing: true,
            serverSide: true,
            orderable: false,
            language: {
                zeroRecords: "No surveillance records to show."
            },
            ajax: {
                url: "{{ route('surveillance-ui.manager.index') }}",
                data: function(filters) {
                    filters.type = $("#filter_surveillance_type").val();
                    filters.status = $("#filter_surveillance_status").val();
                }
            },
            columns: [{
                    "data": "id",
                    orderable: false,
                    searchable: false
                },
                {
                    "data": "type",
                    orderable: false,
                    searchable: false
                },
                {
                    "data": "value",
                    orderable: false,
                    searchable: false
                },
                {
                    "data": "status",
                    orderable: false,
                    searchable: false
                },
                {
                    "data": "actions",
                    orderable: false,
                    searchable: false
                }
            ],
            drawCallback: function(settings) {
                $(window).scrollTop(0);
            }
        });

        $("#filter_surveillance_type, #filter_surveillance_status").change(function(e) {
            surveillance_manager_dt.ajax.reload();
        });

        $('.deleteManagerModal').on('show.bs.modal', function(e) {
            var invoker = $(e.relatedTarget);
            $("#delete-surveillance-manager-form").attr('action', invoker.attr('data-url'));
        });

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
        <h1 class="h5 mb-0 text-gray-800">{{ __('surveillance-ui::app.manager.page_heading') }}</h1>
        @if(session()->has('flash_message'))
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            <i class="fas fa-info-circle"></i>
            {{ session()->get('flash_message') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        <a href="{{ route('surveillance-ui.manager.create') }}" class="float-right btn btn-success btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fa-plus"></i>
            </span>
            <span class="text">{{ __('surveillance-ui::app.manager.create') }}</span>
        </a>
    </div>


    <!-- Content Row -->
    <div class="row">
        <!-- Content Column -->
        <div class="col-lg-12 mb-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    @include('surveillance-ui::manager.filters')
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="text-center table table-bordered" id="manager_listing" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>{{ __('surveillance-ui::app.manager.fields.id') }}</th>
                                    <th>{{ __('surveillance-ui::app.manager.fields.type') }}</th>
                                    <th>{{ __('surveillance-ui::app.manager.fields.value') }}</th>
                                    <th>{{ __('surveillance-ui::app.manager.fields.status') }}</th>
                                    <th>{{ __('surveillance-ui::app.manager.actions') }}</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>{{ __('surveillance-ui::app.manager.fields.id') }}</th>
                                    <th>{{ __('surveillance-ui::app.manager.fields.type') }}</th>
                                    <th>{{ __('surveillance-ui::app.manager.fields.value') }}</th>
                                    <th>{{ __('surveillance-ui::app.manager.fields.status') }}</th>
                                    <th>{{ __('surveillance-ui::app.manager.actions') }}</th>
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
@include('surveillance-ui::manager.show')
@include('surveillance-ui::manager.delete')
@endsection