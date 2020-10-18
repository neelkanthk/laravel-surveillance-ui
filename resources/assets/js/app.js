$(document).ready(function () {
    $('#surveillance-ui-edit-form input#enable').click(function() {
        if($(this).is(':checked') && $('#surveillance-ui-edit-form input#disable').is(':checked'))
        {
            $('#surveillance-ui-edit-form input#enable').prop('checked', true)
            $('#surveillance-ui-edit-form input#disable').prop('checked', false)
        }
    });
    $('#surveillance-ui-edit-form input#disable').click(function() {
        if($(this).is(':checked') && $('#surveillance-ui-edit-form input#enable').is(':checked'))
        {
            $('#surveillance-ui-edit-form input#disable').prop('checked', true)
            $('#surveillance-ui-edit-form input#enable').prop('checked', false)
        }
    });
    $('#surveillance-ui-edit-form input#block').click(function() {
        if($(this).is(':checked') && $('#surveillance-ui-edit-form input#unblock').is(':checked'))
        {
            $('#surveillance-ui-edit-form input#block').prop('checked', true)
            $('#surveillance-ui-edit-form input#unblock').prop('checked', false)
        }
    });
    $('#surveillance-ui-edit-form input#unblock').click(function() {
        if($(this).is(':checked') && $('#surveillance-ui-edit-form input#block').is(':checked'))
        {
            $('#surveillance-ui-edit-form input#unblock').prop('checked', true)
            $('#surveillance-ui-edit-form input#block').prop('checked', false)
        }
    });
});