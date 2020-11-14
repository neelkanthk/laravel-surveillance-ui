<script>
    $(document).ready(function() {
        var surveillance_manager_dt = $('#manager_listing').DataTable({
            processing: true,
            serverSide: true,
            orderable: false,
            language: {
                zeroRecords: "No surveillance records to show.",
                info: "Showing _START_ to _END_ of _TOTAL_ surveillance records",
                infoEmpty: "Showing 0 to 0 of 0 surveillance records",
                infoFiltered: "(filtered from _MAX_ total surveillance records)",
                lengthMenu: "Show _MENU_ surveillance records per page",
            },
            ajax: {
                url: "{{ route('surveillance-ui.manager.index') }}",
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
                    "data": "type",
                    orderable: false,
                    searchable: false
                },
                {
                    "data": "value",
                    orderable: false,
                    searchable: false
                },
                {
                    "data": "status",
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
    });
</script>