@extends('surveillance-ui::layouts.master')

@section('title', __('surveillance-ui::app.logs.sidebar_title') . ' - ' .__('surveillance-ui::app.logs.detail'))

@section('sidebar')
@parent
@endsection

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h5 mb-0 text-gray-800">{{ __('surveillance-ui::app.logs.page_heading') . ' - ' .__('surveillance-ui::app.logs.detail')}}</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <!-- Content Column -->
        <div class="col-lg-12 mb-4">
            <div class="form-group">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="log_id">{{ __('surveillance-ui::app.logs.fields.id') }}</label>
                    </div>
                    <input type="text" class="form-control" id="log_id" placeholder="">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="log_fingerprint">{{ __('surveillance-ui::app.logs.fields.fingerprint') }}</label>
                    </div>
                    <input type="text" class="form-control" id="log_fingerprint" placeholder="">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="log_userid">{{ __('surveillance-ui::app.logs.fields.user_id') }}</label>
                    </div>
                    <input type="text" class="form-control" id="log_userid" placeholder="">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="log_ip">{{ __('surveillance-ui::app.logs.fields.ip') }}</label>
                    </div>
                    <input type="text" class="form-control" id="log_ip" placeholder="">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="log_url">{{ __('surveillance-ui::app.logs.fields.url') }}</label>
                    </div>
                    <input type="text" class="form-control" id="log_url" placeholder="">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="log_useragent">{{ __('surveillance-ui::app.logs.fields.user_agent') }}</label>
                    </div>
                    <input type="text" class="form-control" id="log_useragent" placeholder="">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="log_cookies">{{ __('surveillance-ui::app.logs.fields.cookies') }}</label>
                    </div>
                    <input type="text" class="form-control" id="log_cookies" placeholder="">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="log_session">{{ __('surveillance-ui::app.logs.fields.session') }}</label>
                    </div>
                    <input type="text" class="form-control" id="log_session" placeholder="">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="log_files">{{ __('surveillance-ui::app.logs.fields.files') }}</label>
                    </div>
                    <input type="text" class="form-control" id="log_files" placeholder="">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="created_at">{{ __('surveillance-ui::app.logs.fields.created_at') }}</label>
                    </div>
                    <input type="text" class="form-control" id="created_at" placeholder="">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="updated_at">{{ __('surveillance-ui::app.logs.fields.updated_at') }}</label>
                    </div>
                    <input type="text" class="form-control" id="updated_at" placeholder="">
                </div>
            </div>
            <a href="#" class="btn btn-success btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fas fa-check"></i>
                </span>
                <span class="text">{{ __('surveillance-ui::app.common.ok') }}</span>
            </a>
        </div>
    </div>
</div>

@endsection