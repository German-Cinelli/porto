function fetchInbox(){
    var table = $('#inbox').DataTable({
        'ajax': {
            'url': 'inbox/list',
            'type': 'POST'
        },
        'columns': [
            {'data': 'status',
                render: function(data){
                    if(data == 0){
                        return `<i class="fa fa-square text-blue" data-toggle="tooltip" title="Aún no has respondido el mensaje"></i>`
                    } else {
                        return `<i class="fa fa-check-square text-blue" data-toggle="tooltip" title="Has respondido éste mensaje"></i>`
                    }
                }
            },
            {'data': 'name'},
            {'data': 'email'},
            {'data': 'phone'},
            {'data': 'message', 
                render: function(data){
                    return `<span class="overflow-hidden">` + limitTextWords(data) + `</span>`
                }
            },
            {'data': 'created_at'},
            {'data': 'status',
                render: function(data){
                    `<div class="btn-group">`
                    if(data == 0){
                        return `
                            <a href="#" class="btn-reply btn btn-social-icon" data-toggle="tooltip" title="Responder">
                                <i class="menu-icon fa fa-mail-reply text-blue"></i>
                            </a>
                        `
                    } else {
                        return `
                            <a class="btn btn-social-icon" data-toggle="tooltip" title="Ya respondiste éste mensaje" disabled>
                                <i class="menu-icon fa fa-mail-reply"></i>
                            </a>
                        `
                    }
                }
            }
        ],
        'language': {
            'url': '../../public/assets/datatables/lang/es/spanish.lang'
        }
    });

    reply('#inbox tbody', table);
}

function limitTextWords(text){
    var t = text.length;
    message = text;
    if(t > 65){
        message = text.substr(0,65)+'...';
    }

    return message;
}