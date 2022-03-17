function fetchColors(){
    var table = $('#colors').DataTable({
        'ajax': {
            'url': 'list_removed',
            'type': 'POST'
        },
        'columns': [
            {'data': 'id'},
            {'data': 'name'},
            {'data': 'code', render: function(data){
                let codeColors = "";
    
                codeColors = `<span style="color: ${data}"> <i class="fa fa-square"></i></span>`
                   
                return codeColors;
            }},
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

    getDataRestore('#colors tbody', table);
}