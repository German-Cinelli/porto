function fetchImages(){

    var URL_PATH = $('#url_path').val();

    $.ajax({
        url: URL_PATH + '/admin/image/list',
        type: 'GET',
        success: function(r){
            //console.log(r);

            let images = JSON.parse(r);
            let template = '';
            images.forEach(image => {
                template += `
                    <a href="#" data-image-id="${image.id}">
                        <img src="${URL_PATH}${image.path}" alt="">
                        <input type="checkbox" name="images-check">
                    </a>
                `;
            });

            $('#images').html(template);
 
            
        }
    });

}


function fetchImagesForRadio(){

    var URL_PATH = $('#url_path').val();

    $.ajax({
        url: URL_PATH + '/admin/image/list',
        type: 'GET',
        success: function(r){
            //console.log(r);

            let images = JSON.parse(r);
            let template = '';
            images.forEach(image => {
                template += `
                    <a href="#" data-image-id="${image.id}">
                        <img src="${URL_PATH}${image.path}" alt="">
                        <input type="radio" name="images-check">
                    </a>
                `;
            });

            $('#image').html(template);
 
            
        }
    });

}