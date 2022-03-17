var mediaModal = $('#media-modal'),
library = $('#librayr'), //tab
productImagesContainer = $('.product-images'); //container

library.on('click','a',function(e){
    
    e.preventDefault();

    

    //checkboxprocessing........
    var checkbox = $(this).find('input[type=checkbox]');

    if(!checkbox.is(':checked')){
    	checkbox.prop('checked', true);
    }else{
    	checkbox.prop('checked', false);
    }
});

//insert button and send images to the form and hidden fields tooo....
$('.insert').click(function(e){
    //collect checkbox
    var checkboxes = library.find('input[type=checkbox]');
    checkboxes.each(function(i, el){
    	if(el.checked){
    		var imageId = $(el).parent().data('image-id');
			var imgSrc = $(el).siblings('img').attr('src');
					
			//console.log(imageId);
			//console.log(imgSrc);

    		//template
    		var template = 	'<div class="product-img">'+
    							'<input type="hidden" name="image-ids[]" value="'+ imageId +'">'+
    							'<img src="'+ imgSrc +'" />'+
    							'<a href="#" class="btn btn-xs btn-danger remove" data-toggle="tooltip" title="Remover">'+
								'<i class="fa fa-close"></i></a>'+
    						'</div>';
    		//append
			productImagesContainer.append(template);
					
    	}
    });
    //hide modal
    mediaModal.modal('hide');
});

//remove product images js
productImagesContainer.on('click', '.remove', function(e){
    e.preventDefault();
    //fadeout animation and remove....
    $(this).parent('.product-img').fadeOut('100', function(){
        $(this).remove();
    });
});