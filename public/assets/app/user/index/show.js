var getDataShow = function(tbody, table){

    const URL_PATH = $('#url_path').val();

    $(document).on('click', '.btn-show', function(e){
        var data = table.row( $(this).parents('tr') ).data();
        var id = data.id;

        console.log(id);

       window.location.href = URL_PATH + '/admin/user/show/' + id;

       e.preventDefault();
    });

}