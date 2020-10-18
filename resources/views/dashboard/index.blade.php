@extends('surveillance-ui::layouts.master')

@section('title', __('surveillance-ui::app.dashboard.sidebar_title'))

@section('sidebar')
    @parent
@endsection

@section('content')
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">{{ __('surveillance-ui::app.dashboard.page_heading') }}</h1>
</div>

<!-- Content Row -->
<div class="row">

    <!-- Content Column -->
    <div class="col-lg-6 mb-4">

        <!-- Project Card Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-dark">{{ __('surveillance-ui::app.surveillance_status.enable') }}</h6>
            </div>
            <div class="card-body">
                <h4 class="small font-weight-bold">{{ __('surveillance-ui::app.surveillance_types.ip') }}<span class="float-right">20</span></h4>
                <div class="progress mb-4">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <h4 class="small font-weight-bold">{{ __('surveillance-ui::app.surveillance_types.fingerprint') }}<span class="float-right">40</span></h4>
                <div class="progress mb-4">
                    <div class="progress-bar bg-info" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <h4 class="small font-weight-bold">{{ __('surveillance-ui::app.surveillance_types.user_id') }}<span class="float-right">60</span></h4>
                <div class="progress mb-4">
                    <div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Column -->
    <div class="col-lg-6 mb-4">

        <!-- Project Card Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-dark">{{ __('surveillance-ui::app.surveillance_status.block') }}</h6>
            </div>
            <div class="card-body">
                <h4 class="small font-weight-bold">{{ __('surveillance-ui::app.surveillance_types.ip') }}<span class="float-right">20</span></h4>
                <div class="progress mb-4">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <h4 class="small font-weight-bold">{{ __('surveillance-ui::app.surveillance_types.fingerprint') }}<span class="float-right">40</span></h4>
                <div class="progress mb-4">
                    <div class="progress-bar bg-info" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <h4 class="small font-weight-bold">{{ __('surveillance-ui::app.surveillance_types.user_id') }}<span class="float-right">60</span></h4>
                <div class="progress mb-4">
                    <div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
@endsection