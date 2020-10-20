@extends('surveillance-ui::layouts.master')

@section('title', __('surveillance-ui::app.manager.sidebar_title') . ' - ' .__('surveillance-ui::app.manager.create'))

@section('sidebar')
@parent
@endsection

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h5 mb-0 text-gray-800">{{ __('surveillance-ui::app.manager.page_heading') . ' - ' .__('surveillance-ui::app.manager.create')}}</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <!-- Content Column -->
        <div class="col-lg-6 mb-4">
            <form id="surveillance-ui-create-form" method="POST" action="{{ route('surveillance-ui.manager.store') }}">
                @csrf
                @include('surveillance-ui::manager.partials.flash_alert')

                <div class="form-group">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="type">{{ __('surveillance-ui::app.manager.fields.type') }}
                                <sup class="text-danger"><i class="fa fa-asterisk" aria-hidden="true"></i></sup>
                            </label>
                        </div>
                        <select name="type" class="custom-select" id="type">
                            <option {{ old('type') == '' ? 'selected' : '' }}  value="" selected>{{ __('surveillance-ui::app.common.choose') }}</option>
                            <option {{ old('type') == 'ip' ? 'selected' : '' }} value="ip">{{ __('surveillance-ui::app.surveillance_types.ip') }}</option>
                            <option {{ old('type') == 'userid' ? 'selected' : '' }} value="userid">{{ __('surveillance-ui::app.surveillance_types.userid') }}</option>
                            <option {{ old('type') == 'fingerprint' ? 'selected' : '' }} value="fingerprint">{{ __('surveillance-ui::app.surveillance_types.fingerprint') }}</option>
                        </select>
                    </div>
                    @error('type')
                    <div class="text text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="value">{{ __('surveillance-ui::app.manager.fields.value') }}
                                <sup class="text-danger"><i class="fa fa-asterisk" aria-hidden="true"></i></sup>
                            </label>
                        </div>
                        <input type="text" name="value" class="form-control" id="value" placeholder="" value="{{ old('value') }}">
                    </div>
                    @error('value')
                    <div class="text text-danger">{{ $message }}</div>
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
                                <input id="enable" name="status[enable]" value="enable" type="checkbox" />
                                <span class="default"></span>
                            </label>
                        </li>
                        <li class="list-group-item ml-3">
                            {{ __('surveillance-ui::app.surveillance_status.block') }}
                            <label class="checkbox">
                                <input id="block" name="status[block]" value="block" type="checkbox" />
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
                    <span class="text">{{ __('surveillance-ui::app.manager.save') }}</span>
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