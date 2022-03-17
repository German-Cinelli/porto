var getDataGallery = function(tbody, table){
    $(document).on('click', '.btn-gallery', function(){
        var data = table.row( $(this).parents('tr') ).data();
        var id = data.id;

        window.location.replace('http://localhost/Projects/Paulina-Shoes/public/admin/product/show/' + id + '#edit-gallery');
    })
}