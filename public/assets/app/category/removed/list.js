function fetchCategories(){
    var table = $('#categories').DataTable({
        'ajax': {
            'url': 'list_removed',
            'type': 'POST'
        },
        'columns': [
            {'data': 'id'},
            {'data': 'name'},
            {'data': 'deleted_at'},
            {'defaultContent': `
                <div class="btn-group">
                    <a href="#" class="btn-restore btn btn-social-icon" data-toggle="modal" data-target="#modal-edit" data-toggle="tooltip" title="Restaurar">
                        <i class="menu-icon fa fa-recycle text-green"></i>
                    </a>
                </div>`
            }
        ],
        'language': {
            'url': '../../../public/assets/datatables/lang/es/spanish.lang'
        }
    });

    getDataRestore('#categories tbody', table);
}