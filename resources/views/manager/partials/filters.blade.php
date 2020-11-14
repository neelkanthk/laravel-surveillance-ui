<div class="row">
    <div class="col-lg-3 mb-3">
        <strong>{{ __('surveillance-ui::app.manager.filters.type') }}</strong>
        <select name="type" class="custom-select" id="filter_surveillance_type">
            <option value="" selected>{{ __('surveillance-ui::app.common.choose') }}</option>
            <option value="ip">{{ __('surveillance-ui::app.surveillance_types.ip') }}</option>
            <option value="userid">{{ __('surveillance-ui::app.surveillance_types.userid') }}</option>
            <option value="fingerprint">{{ __('surveillance-ui::app.surveillance_types.fingerprint') }}</option>
        </select>
    </div>
    <div class="col-lg-3 mb-3">
        <strong>{{ __('surveillance-ui::app.manager.filters.status') }}</strong>
        <select name="type" class="custom-select" id="filter_surveillance_status">
            <option value="" selected>{{ __('surveillance-ui::app.common.choose') }}</option>
            <option value="enabled">{{ __('surveillance-ui::app.surveillance_status.enable') }}</option>
            <option value="disabled">{{ __('surveillance-ui::app.surveillance_status.disable') }}</option>
            <option value="blocked">{{ __('surveillance-ui::app.surveillance_status.block') }}</option>
            <option value="unblocked">{{ __('surveillance-ui::app.surveillance_status.unblock') }}</option>
        </select>
    </div>
    <div class="float-right col-lg-3 mb-3">
        <!-- More Filters -->
    </div>

</div>