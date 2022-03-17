$('#form-upload-images').submit(function(e){
    
    var formData = new FormData();
	var ins = document.getElementById('multiFiles').files.length;
	for (var x = 0; x < ins; x++) {
		formData.append("files[]", document.getElementById('multiFiles').files[x]);
    }
    
    console.log(formData);

    $.ajax({
        data: formData,
        url:  URL_PATH + '/admin/image/store',
        type: 'POST',
        contentType: false,
        processData: false,
        beforesend: function(){

        },
        success: function(r){
            alert(r);
            fetchImages();
        }
    });

    $("#multiFiles").val(null);

    e.preventDefault();
});