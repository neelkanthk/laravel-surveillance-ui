@if($surveillance["surveillance_enabled"])
<span class="badge badge-success">{{ __('surveillance-ui::app.surveillance_status.enable') }}</span>
@else
<span class="badge badge-warning">{{ __('surveillance-ui::app.surveillance_status.disable') }}</span>
@endif
@if($surveillance["access_blocked"])
<span class="badge badge-danger">{{ __('surveillance-ui::app.surveillance_status.block') }}</span>
@else
<span class="badge badge-warning">{{ __('surveillance-ui::app.surveillance_status.unblock') }}</span>
@endif