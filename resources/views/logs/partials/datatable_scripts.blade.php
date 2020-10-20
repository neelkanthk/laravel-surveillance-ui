<script>
    $(document).ready(function() {
        var surveillance_manager_dt = $('#logs_listing').DataTable({
            processing: true,
            serverSide: true,
            orderable: false,
            language: {
                zeroRecords: "No surveillance logs to show.",
                info: "Showing _START_ to _END_ of _TOTAL_ surveillance logs",
                infoEmpty: "Showing 0 to 0 of 0 surveillance records",
                infoFiltered: "(filtered from _MAX_ total surveillance logs)",
                lengthMenu: "Show _MENU_ surveillance logs per page",
            },
            ajax: {
                url: "{{ route('surveillance-ui.logs.index') }}",
                data: function(filters) {
                    filters.type = $("#filter_surveillance_type").val();
                    filters.status = $("#filter_surveillance_status").val();
                }
            },
            columns: [{
                    "data": "id",
                    orderable: false,
                    searchable: false
                },
                {
                    "data": "ip",
                    orderable: false,
                    searchable: false
                },
                {
                    "data": "userid",
                    orderable: false,
                    searchable: false
                },
                {
                    "data": "fingerprint",
                    orderable: false,
                    searchable: false
                },
                {
                    "data": "url",
                    orderable: false,
                    searchable: false
                },
                {
                    "data": "created_at",
                    orderable: false,
                    searchable: false
                },
                {
                    "data": "actions",
                    orderable: false,
                    searchable: false
                }
            ],
            drawCallback: function(settings) {
                $(window).scrollTop(0);
            }
        });

        $("#filter_surveillance_type, #filter_surveillance_status").change(function(e) {
            surveillance_manager_dt.ajax.reload();
        });

        $('.deleteManagerModal').on('show.bs.modal', function(e) {
            var invoker = $(e.relatedTarget);
            $("#delete-surveillance-manager-form").attr('action', invoker.attr('data-url'));
        });

        $('.showManagerDetailModal').on('show.bs.modal', function(e) {
            var invoker = $(e.relatedTarget);
            var endpoint = invoker.attr('data-url');
            $.ajax({
                url: endpoint,
                type: "GET",
                beforeSend: function() {
                    $('#surveillanceManagerDetailForm').addClass('d-none');
                    $('.showManagerDetailModal #spinner').removeClass('d-none');
                },
                success: function(result) {
                    $('#surveillanceManagerDetailForm').removeClass('d-none');
                    var form = $("#surveillanceManagerDetailForm");
                    var i;
                    var data = result.data;
                    for (key in data) {
                        form.find('#' + key).val((data[key]) ? data[key] : 'NULL');
                    }
                },
                error: function(xhr, error) {
                    var obj = xhr.responseJSON;
                    $('.showManagerDetailModal #errorMessage').html(obj.data);
                    $('.showManagerDetailModal #error-alert-box').removeClass('d-none');
                },
                complete: function() {
                    $('.showManagerDetailModal #spinner').addClass('d-none');
                }
            });
        });

    });
</script>