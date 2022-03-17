var getDataPrint = function(tbody, table){
    $(document).on('click', '.btn-print', function(e){
        var data = table.row( $(this).parents('tr') ).data();
        var id = data.id;

        console.log(id);

       window.open('print/' + id, '_blank');

       e.preventDefault();
    });

}