function fetchOrders(){
    var table = $('#orders').DataTable({
        'ajax': {
            'url': 'order/list',
            'type': 'POST'
        },
        'columns': [
            {'data': 'id', 
                render: function(data){
                    return `<a href="order/show/${data}">#${data}</a>`
                }
            },
            {'data': 'user.lastname'},
            {'data': 'shipping_location'},
            {'data': 'shipping_city'},
            {'data': 'shipping_address'},
            {'data': 'total_amount', 
                render: function(data){
                    return `<span class="text-green">$${data}</span>`
                }
            },
            {'data': 'status', 
                render: function(data){
                    switch (data) {
                        case 'Pendiente':
                            return `<i class="fa fa-minus-square text-yellow" data-toggle="tooltip" title="${data}"></i></span>`
                            break;
                        case 'Concretado':
                            return `<i class="fa fa-check-square text-blue" data-toggle="tooltip" title="${data}"></i></span>`
                            break;
                        default:
                            break;
                    }
                   
                    
            }
            },
            {'data': 'created_at'},

            {data: 'status', 
                render: function(data){
                    if(data == 'Pendiente'){
                            return `
                                <div class="btn-group">
                                    <a href="#" class="btn-show btn btn-social-icon" data-toggle="tooltip" title="Más información">
                                        <i class="menu-icon fa fa-info-circle text-blue"></i>
                                    </a>
                                    <a href="#" class="btn-change-status btn btn-social-icon" data-toggle="tooltip" title="Concretar pedido">
                                        <i class="menu-icon fa fa-compress text-green"></i>
                                    </a>
                                    <a href="#" class="btn-print btn btn-social-icon" data-toggle="tooltip" title="Imprimir factura">
                                        <i class="menu-icon fa fa-print text-black"></i>
                                    </a>
                                </div>
                            `
                    } else {
                            return `
                                <div class="btn-group">
                                    <a href="#" class="btn-show btn btn-social-icon" data-toggle="tooltip" title="Más información">
                                        <i class="menu-icon fa fa-info-circle text-blue"></i>
                                    </a>
                                    <button href="#" class="btn-change-status btn btn-social-icon" data-toggle="tooltip" title="El pedido ya ha sido concretado" disabled>
                                        <i class="menu-icon fa fa-compress text-green"></i>
                                    </button>
                                    <a href="#" class="btn-print btn btn-social-icon" data-toggle="tooltip" title="Imprimir factura">
                                        <i class="menu-icon fa fa-print text-black"></i>
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

    getDataShow('#orders tbody', table);
    getDataConfirm_shipment('#orders tbody', table);
    getDataPrint('#orders tbody', table);
}