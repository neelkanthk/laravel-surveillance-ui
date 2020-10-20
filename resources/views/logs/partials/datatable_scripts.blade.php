<script>
    $(document).ready(function() {
        var surveillance_logs_dt = $('#logs_listing').DataTable({
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
                    filters.type = $("#filter_datetime_range").val();
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

        $('#filter_datetime_range').on('apply.daterangepicker', function(ev, picker) {
            $(this).val(picker.startDate.format('YYYY-MM-DD HH:mm:ss') + ' - ' + picker.endDate.format('YYYY-MM-DD HH:mm:ss'));
            surveillance_logs_dt.ajax.reload();
        });
    });
</script>