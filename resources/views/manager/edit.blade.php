@extends('surveillance-ui::layouts.master')

@section('title', __('surveillance-ui::app.manager.sidebar_title') . ' - ' .__('surveillance-ui::app.manager.update'))

@section('sidebar')
@parent
@endsection

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h5 mb-0 text-gray-800">{{ __('surveillance-ui::app.manager.page_heading') . ' - ' .__('surveillance-ui::app.manager.update')}}</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <!-- Content Column -->
        <div class="col-lg-6 mb-4">
            <form method="POST" action="{{ route('surveillance-ui.manager.update') }}">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="type">{{ __('surveillance-ui::app.manager.fields.type') }}</label>
                        </div>
                        <select class="custom-select" id="type">
                            <option selected>{{ __('surveillance-ui::app.common.choose') }}</option>
                            <option value="ip">{{ __('surveillance-ui::app.surveillance_types.ip') }}</option>
                            <option value="user_id">{{ __('surveillance-ui::app.surveillance_types.user_id') }}</option>
                            <option value="fingerprint">{{ __('surveillance-ui::app.surveillance_types.fingerprint') }}</option>
                        </select>
                    </div>
                    @error('type')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="value">{{ __('surveillance-ui::app.manager.fields.value') }}</label>
                        </div>
                        <input type="text" class="form-control" id="value" placeholder="">
                    </div>
                    @error('value')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="action">{{ __('surveillance-ui::app.manager.fields.action') }}</label>
                        </div>
                        <select class="custom-select" id="action">
                            <option selected>{{ __('surveillance-ui::app.common.choose') }}</option>
                            <option value="enable">{{ __('surveillance-ui::app.surveillance_status.enable') }}</option>
                            <option value="block">{{ __('surveillance-ui::app.surveillance_status.block') }}</option>
                        </select>
                    </div>
                    @error('action')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <a href="#" class="btn btn-success btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-check"></i>
                    </span>
                    <span class="text">{{ __('surveillance-ui::app.manager.update') }}</span>
                </a>

                <a href="{{ route('surveillance-ui.manager.index') }}" class="btn btn-warning btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-times"></i>
                    </span>
                    <span class="text">{{ __('surveillance-ui::app.common.cancel') }}</span>
                </a>
            </form>
        </div>
    </div>
</div>

@endsection