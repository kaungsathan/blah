$(function () {

    const dataTable = $('#data-table')
    const dataRoute = dataTable.data('route')
    const createRoute = dataTable.data('create-route')

    dataTable.DataTable({
        "paging": true,
        "lengthChange": true,
        "lengthMenu": [[10, 20, 30, 40], [10, 20, 30, 40]],
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "processing": true,
        "serverSide": true,
        "oLanguage": {
            "sProcessing": "Processing...",
            "sZeroRecords": "No Records..."
        },

        'columns': [
            {'data': 'id', 'orderable': true, 'class': 'text-center small'},
            {'data': 'name', 'orderable': true, 'class': 'text-center'},
            {'data': 'email', 'orderable': true, 'class': 'text-center'},
            {'data': 'mobile_number', 'orderable': true, 'class': 'text-center'},
            {'data': 'address', 'orderable': true, 'class': 'text-center'},
        ],
        'columnDefs': [{
            'targets': 'no-sort',
            'orderable': false,
        }],
        'ajax': {
            'url': dataRoute,
            'type': 'GET',
            'headers': {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            'data': function (data) {

            }
        },
    }).$('div.dataTables_filter')

    $('div.dataTables_filter').prepend(`
        <a href="${createRoute}" class="btn btn-primary" style="margin-right: 30px">
             Register User
        </a>
    `)
});
