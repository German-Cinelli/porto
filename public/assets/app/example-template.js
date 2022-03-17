function fetchMaterials(){
    $.ajax({
        url: 'material/list',
        type: 'GET',
        success: function(r){
            //console.log(r);

            let materials = JSON.parse(r);
            let template = '';
            materials.forEach(material => {
                template += `
                    <tr>
                        <td>${material.id}</td>
                        <td>${material.name}</td>
                        <td>${material.description}</td>
                        <td>
                            ${Object.keys(material.colors).map(key => (
                                `<span style="color: ${material.colors[key].code}"> <i class="fa fa-square"></i></span>`
                            )).join('')}

                        </td>
                        <td>${material.created_at}</td>
                        <td>${material.updated_at}</td>
                        <td>
                            <div class="btn-group">
                                <a href="#" editId="${material.id}" class="btn-edit btn btn-social-icon" data-toggle="modal" data-target="#modal-edit">
                                    <i class="menu-icon fa fa-edit text-orange"></i>
                                </a>
                                <a deleteId="${material .id}" class="btn-delete btn btn-social-icon">
                                    <i class="menu-icon fa fa-trash text-red"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                `;
            });

            $('#materials').html(template);
 
            setTimeout(function(){ 
                isEmpty();
            }, 2200);
           

             function isEmpty(){
                if(Object.keys(r).length == 2){
                    Swal.fire(
                        'No se encontraron resultados',
                        'Añada nuevos registros para visualizarlos aquí.',
                        'info',
                      )
                }
            }

            
        }
    })

}