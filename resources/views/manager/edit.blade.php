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
            <form id="surveillance-ui-edit-form" method="POST" action="{{ route('surveillance-ui.manager.update',2) }}">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="type">{{ __('surveillance-ui::app.manager.fields.type') }}</label>
                        </div>
                        <select class="custom-select" name="type" id="type">
                            <option value="">{{ __('surveillance-ui::app.common.choose') }}</option>
                            <option {{ $surveillanceRecord->type == 'ip' ? 'selected' : '' }} value="ip">{{ __('surveillance-ui::app.surveillance_types.ip') }}</option>
                            <option {{ $surveillanceRecord->type == 'userid' ? 'selected' : '' }} value="userid">{{ __('surveillance-ui::app.surveillance_types.userid') }}</option>
                            <option {{ $surveillanceRecord->type == 'fingerprint' ? 'selected' : '' }} value="fingerprint">{{ __('surveillance-ui::app.surveillance_types.fingerprint') }}</option>
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
                        <input type="text" name="value" class="form-control" id="value" placeholder="" value="{{ $surveillanceRecord->value }}">
                    </div>
                    @error('value')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <ul class="list-group list-group-flush alert alert-secondary mb-3">
                        <div class="input-group-prepend ml-3">
                            <label class="" for="status">{{ __('surveillance-ui::app.manager.fields.status') }}
                                <sup class="text-danger"><i class="fa fa-asterisk" aria-hidden="true"></i></sup>
                            </label>
                        </div>
                        <li class="list-group-item ml-3">
                            {{ __('surveillance-ui::app.surveillance_status.enable') }}
                            <label class="checkbox">
                                <input {{ !empty($surveillanceRecord->surveillance_enabled) ? 'checked' : '' }} id="enable" name="status[enable]" value="enable" type="radio" />
                                <span class="default"></span>
                            </label>
                        </li>
                        <li class="list-group-item ml-3">
                            {{ __('surveillance-ui::app.surveillance_status.disable') }}
                            <label class="checkbox">
                                <input {{ empty($surveillanceRecord->surveillance_enabled) ? 'checked' : '' }} id="disable" name="status[disable]" value="disable" type="radio" />
                                <span class="default"></span>
                            </label>
                        </li>
                        <li class="list-group-item ml-3">
                            {{ __('surveillance-ui::app.surveillance_status.block') }}
                            <label class="checkbox">
                                <input {{ !empty($surveillanceRecord->access_blocked) ? 'checked' : '' }} id="block" name="status[block]" value="block" type="radio" />
                                <span class="default"></span>
                            </label>
                        </li>
                        <li class="list-group-item ml-3">
                            {{ __('surveillance-ui::app.surveillance_status.unblock') }}
                            <label class="checkbox">
                                <input {{ empty($surveillanceRecord->access_blocked) ? 'checked' : '' }} id="unblock" name="status[unblock]" value="unblock" type="radio" />
                                <span class="default"></span>
                            </label>
                        </li>
                        @error('status')
                        <div class="text text-danger">{{ $message }}</div>
                        @enderror
                    </ul>
                </div>
                <button type="submit" class="btn btn-success btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-check"></i>
                    </span>
                    <span class="text">{{ __('surveillance-ui::app.manager.update') }}</span>
                </button>
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