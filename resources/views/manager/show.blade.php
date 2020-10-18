<!-- Show Manager Detail Modal-->
<div class="modal fade showManagerDetailModal" tabindex="-1" role="dialog" aria-labelledby="showManagerDetailModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="showManagerDetailModalHeading">{{ __('surveillance-ui::app.manager.detail') }}</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="row">
                <div class="modal-body">
                    <!-- Content Column -->
                    <div class="col-lg-12 mb-4">
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="surveillance_id">{{ __('surveillance-ui::app.manager.fields.id') }}</label>
                                </div>
                                <input type="text" class="form-control" id="surveillance_id" placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="type">{{ __('surveillance-ui::app.manager.fields.type') }}</label>
                                </div>
                                <input type="text" class="form-control" id="type" placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="value">{{ __('surveillance-ui::app.manager.fields.value') }}</label>
                                </div>
                                <input type="text" class="form-control" id="value" placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="status">{{ __('surveillance-ui::app.manager.fields.status') }}</label>
                                </div>
                                <input type="text" class="form-control" id="status" placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="surveillance_enabled_at">{{ __('surveillance-ui::app.manager.fields.surveillance_enabled_at') }}</label>
                                </div>
                                <input type="text" class="form-control" id="surveillance_enabled_at" placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="surveillance_disabled_at">{{ __('surveillance-ui::app.manager.fields.surveillance_disabled_at') }}</label>
                                </div>
                                <input type="text" class="form-control" id="surveillance_disabled_at" placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="access_blocked_at">{{ __('surveillance-ui::app.manager.fields.access_blocked_at') }}</label>
                                </div>
                                <input type="text" class="form-control" id="access_blocked_at" placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="access_unblocked_at">{{ __('surveillance-ui::app.manager.fields.access_unblocked_at') }}</label>
                                </div>
                                <input type="text" class="form-control" id="access_unblocked_at" placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="created_at">{{ __('surveillance-ui::app.manager.fields.created_at') }}</label>
                                </div>
                                <input type="text" class="form-control" id="created_at" placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="updated_at">{{ __('surveillance-ui::app.manager.fields.updated_at') }}</label>
                                </div>
                                <input type="text" class="form-control" id="updated_at" placeholder="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Show Manager Detail Modal-->