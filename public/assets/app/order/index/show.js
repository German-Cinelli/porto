var getDataShow = function(tbody, table){
    $(document).on('click', '.btn-show', function(e){
        var data = table.row( $(this).parents('tr') ).data();
        var id = data.id;

        console.log(id);

       window.location.href = 'order/show/' + id;

       e.preventDefault();
    });

}