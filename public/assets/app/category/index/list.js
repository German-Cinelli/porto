function fetchCategories(){
    var table = $('#categories').DataTable({
        'ajax': {
            'url': 'category/list',
            'type': 'POST'
        },
        'columns': [
            {'data': 'id'},
            {'data': 'name'},
            {'data': 'subcategories',
                render: function(data, type, row, meta){
                    let subcategories_name = '';
                    data.forEach(subcategory => {
                        subcategories_name += `<span class="label bg-blue">${subcategory.name}</span> `
                    
                    });
                    return subcategories_name;
                }
            },
            {'defaultContent': `
                <div class="btn-group">
                    <a href="#" class="btn-edit btn btn-social-icon" data-toggle="modal" data-target="#modal-edit" data-toggle="tooltip" title="Editar">
                        <i class="menu-icon fa fa-edit text-orange"></i>
                    </a>
                </div>`
            }
        ],
        'language': {
            'url': '../library/datatables/lang/es/spanish.lang'
        }
    });

    getDataEdit('#categories tbody', table);
    getDataDelete('#categories tbody', table);
}