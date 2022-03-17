function fetchCustomers(){
    var table = $('#customers').DataTable({
        'ajax': {
            'url': 'user/list',
            'type': 'POST'
        },
        'columns': [
            {'data': 'id'},
            {'data': 'name', 
                render: function(data){
                    return `<a href="#" class="btn-show">${data}</span>`
                }
            },
            {'data': 'document'},
            {'data': 'email'},
            {'data': 'phone'},
            {'data': 'city'},
            {'data': 'created_at'},
            {'data': 'status',
                render: function(data){
                    return `
                        <a href="#" class="btn-show btn btn-social-icon" data-toggle="tooltip" title="Ver">
                            <i class="menu-icon fa fa-search-plus text-blue"></i>
                        </a>
                    `
                }
            }
        ],
        'language': {
            url: `../library/datatables/lang/es/spanish.lang`
        }
    });

    getDataShow('#customers tbody', table);
}