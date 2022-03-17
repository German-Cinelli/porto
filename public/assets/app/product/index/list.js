function fetchProducts(){
    var table = $('#products').DataTable({
        'ajax': {
            'url': 'product/list',
            'type': 'POST'
        },
        
        'columns': [
            {data: 'id'},
            {data: 'image', 
                render: function(data){
                    return `<img width="50px" class="img-responsive" src="..${data}">`
                }
            },
            {data: 'name', 
                render: function(data){
                    return `<a href="#" class="btn-show">${data}</span>`
                }
            },
            {data: 'category.name'},
            {data: 'price', 
                render: function(data){
                    return `$${data}`
                }
            },
            {data: 'offer', 
                render: function(data){
                    if(data == 0){
                        return ''
                    } else {
                        return `<span class="text-muted label bg-blue">-${data}% OFF</span>`
                    }
              }
            },
            {data: 'price_final', 
                render: function(data){
                    return `<span class="text-green">$${data}</span>`
                }
            },
            {data: 'is_deleted', 
                render: function(data){
                    if(data == null){
                            return `<span class="text-muted label bg-green data-toggle="tooltip" title="El calzado está disponible para su venta en el catálogo."">Activo</span>`
                    } else {
                            return `<span class="text-muted label bg-red data-toggle="tooltip" title="El calzado NO se está mostrando en el catálogo."">Inactivo</span>`
                    }
                }
            },
            {data: 'is_deleted', 
                render: function(data){
                    if(data == null){
                            return `
                                <div class="btn-group">
                                    <a href="#" class="btn-show btn btn-social-icon" data-toggle="tooltip" title="Ver más">
                                        <i class="menu-icon fa fa-search-plus text-blue"></i>
                                    </a>

                                    <a href="#" class="btn-edit btn btn-social-icon" data-toggle="modal" data-target="#modal-edit" data-toggle="tooltip" title="Editar">
                                        <i class="menu-icon fa fa-edit text-orange"></i>
                                    </a>

                                    <a href="#" class="btn-delete btn btn-social-icon" data-toggle="tooltip" title="Enviar a papelera">
                                        <i class="menu-icon fa fa-trash text-red"></i>
                                    </a>
                                </div>
                            `
                    } else {
                            return `
                                <div class="btn-group">
                                    <a href="#" class="btn-show btn btn-social-icon" data-toggle="tooltip" title="Ver más">
                                        <i class="menu-icon fa fa-search-plus text-blue"></i>
                                    </a>

                                    <button href="#" class="btn btn-social-icon disabled" data-toggle="tooltip" title="Para editar es necesario que el registro esté activo">
                                        <i class="menu-icon fa fa-edit text-orange" disabled></i>
                                    </button>

                                    <a href="#" class="btn-restore btn btn-social-icon" data-toggle="tooltip" title="Restaurar">
                                        <i class="menu-icon fa fa-recycle text-green"></i>
                                    </a>
                                </div>
                            `
                    }
                }
            },
            
        ],
        'language': {
            'url': '../../public/assets/datatables/lang/es/spanish.lang'
        }
        
    });
    
    getDataShow('#products tbody', table);
    getDataEdit('#products tbody', table);
    getDataDelete('#products tbody', table);
    getDataRestore('#products tbody', table);
    getDataGallery('#products tbody', table);
}