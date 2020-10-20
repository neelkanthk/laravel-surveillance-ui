$(document).ready(function () {
    $('#surveillance-ui-edit-form input#enable').click(function () {
        if ($(this).is(':checked') && $('#surveillance-ui-edit-form input#disable').is(':checked')) {
            $('#surveillance-ui-edit-form input#enable').prop('checked', true)
            $('#surveillance-ui-edit-form input#disable').prop('checked', false)
        }
    });
    $('#surveillance-ui-edit-form input#disable').click(function () {
        if ($(this).is(':checked') && $('#surveillance-ui-edit-form input#enable').is(':checked')) {
            $('#surveillance-ui-edit-form input#disable').prop('checked', true)
            $('#surveillance-ui-edit-form input#enable').prop('checked', false)
        }
    });
    $('#surveillance-ui-edit-form input#block').click(function () {
        if ($(this).is(':checked') && $('#surveillance-ui-edit-form input#unblock').is(':checked')) {
            $('#surveillance-ui-edit-form input#block').prop('checked', true)
            $('#surveillance-ui-edit-form input#unblock').prop('checked', false)
        }
    });
    $('#surveillance-ui-edit-form input#unblock').click(function () {
        if ($(this).is(':checked') && $('#surveillance-ui-edit-form input#block').is(':checked')) {
            $('#surveillance-ui-edit-form input#unblock').prop('checked', true)
            $('#surveillance-ui-edit-form input#block').prop('checked', false)
        }
    });

    $('#filter_datetime_range').daterangepicker({
        timePicker: true,
        timePicker24Hour: true,
        timePickerSeconds: true,
        autoUpdateInput: false,
        locale: {
            format: 'YYYY-MM-DD HH:mm:ss'
        }
    });

    $('.deleteLogModal').on('show.bs.modal', function (e) {
        var invoker = $(e.relatedTarget);
        $("#delete-surveillance-log-form").attr('action', invoker.attr('data-url'));
    });

    $('.deleteManagerModal').on('show.bs.modal', function (e) {
        var invoker = $(e.relatedTarget);
        $("#delete-surveillance-manager-form").attr('action', invoker.attr('data-url'));
    });

    $('.showManagerDetailModal').on('show.bs.modal', function (e) {
        var invoker = $(e.relatedTarget);
        var endpoint = invoker.attr('data-url');
        $.ajax({
            url: endpoint,
            type: "GET",
            beforeSend: function () {
                $('#surveillanceManagerDetailForm').addClass('d-none');
                $('.showManagerDetailModal #spinner').removeClass('d-none');
            },
            success: function (result) {
                $('#surveillanceManagerDetailForm').removeClass('d-none');
                var form = $("#surveillanceManagerDetailForm");
                var i;
                var data = result.data;
                for (key in data) {
                    form.find('#' + key).val((data[key]) ? data[key] : 'NULL');
                }
            },
            error: function (xhr, error) {
                var obj = xhr.responseJSON;
                $('.showManagerDetailModal #errorMessage').html(obj.data);
                $('.showManagerDetailModal #error-alert-box').removeClass('d-none');
            },
            complete: function () {
                $('.showManagerDetailModal #spinner').addClass('d-none');
            }
        });
    });
});