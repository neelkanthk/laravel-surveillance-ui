<!-- Delete Log Modal -->
<div class="modal fade deleteLogModal" tabindex="-1" role="dialog" aria-labelledby="showLogDetailModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteLogModalHeading">{{ __('surveillance-ui::app.common.delete_confirmation') }}</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-footer">
                <form id="delete-surveillance-log-form" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="button" onclick="submit()" data-dismiss="modal">{{ __('surveillance-ui::app.common.delete') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Delete Log Modal -->