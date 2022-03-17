function fetchMaterials(){
    var table = $('#materials').DataTable({
        'ajax': {
            'url': 'material/list',
            'type': 'POST'
        },
        
        'columns': [
            {data: 'id'},
            {data: 'name'},
            {data: 'colors', render: function(data, type, row, meta){
                let codeColors = "";
                data.forEach(color => {
                    codeColors += `<span style="color: ${color.code}"> <i class="fa fa-square"></i></span>`
                   
                });
                return codeColors;
            }},
            {defaultContent: `
                <div class="btn-group">
                    <a href="#" class="btn-edit btn btn-social-icon" data-toggle="modal" data-target="#modal-edit" data-toggle="tooltip" title="Editar">
                        <i class="menu-icon fa fa-edit text-orange"></i>
                    </a>
                </div>`
            }
        ],
        'language': {
            'url': '../../public/assets/datatables/lang/es/spanish.lang'
        }
        
    });
    
    getDataEdit('#materials tbody', table);
    getDataDelete('#materials tbody', table);
}