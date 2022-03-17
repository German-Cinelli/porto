function fetchColors(){
    var URL_PATH = $('#url_path').val();
    var table = $('#colors').DataTable({
        'ajax': {
            'url': 'color/list',
            'type': 'POST'
        },
        'columns': [
            {data: 'id'},
            {data: 'name'},
            {data: 'code', render: function(data){
                let codeColors = "";
    
                codeColors = `<span style="color: ${data}"> <i class="fa fa-square"></i></span>`
                   
                return codeColors;
            }},
            {data: 'image', render: function(data){
                
                return `<img width="50px" class="img-responsive" src="..${data}">`
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

    getDataEdit('#colors tbody', table);
    getDataDelete('#colors tbody', table);
}