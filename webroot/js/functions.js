function openMenuXs(){
    openModal('#modalMenuXs');
}

function openModal(selector){
    $(selector).modal({
		backdrop: 'static',
		keyboard: false,
		focus: true
    });
}

function closeModal(selector){
	$(selector).modal('hide');
}

function makeRichtTextAreas(){
	tinymce.init({
		selector: ".richTextArea",
		height: 400,
		//inline: true,
		menubar: false,
		statusbar: false,
		plugins: [
			'textcolor colorpicker'
		],
		setup: function (editor) {
            editor.on('change', function () {
                tinymce.triggerSave();
            });
        },
		toolbar1: 'undo redo | styleselect | forecolor backcolor bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent'
	});
}

function openImageZoom(path){
	$("#imageZoom .imageZoom").css('background-image', 'url("/phpThumb/phpThumb.php?src='+path+'&w=500&h=500")');
	openModal("#imageZoom");
}

function stopPropagation(e){
	e.cancelBubble=true;
}

function removeImageFromGroup(element, image_id){
	
	openAlertYesNo("¿Eliminar Imagen?", function(result){
		if(result){
			openModal("#modal-ajax-block");
			queryServerJson(
				'/Admin/removeImageFromGroup/'+image_id, 
				{}, 
				function(data){
					if(data['status']=='ok'){
						$(element).parents('.preview').first().remove();
					}
				}, 
				function(){
					closeModal("#modal-ajax-block");
				}, 
				null
			);
		}
	});
}


function getFileExtension(path){
	var match = path.match(/.+\.(.+?)$/);
	if(match){
		return match[1];
	}
	return null;
}

function setCurrentImageImageGroup(element, path){
	var f='';
	var ext=getFileExtension(path);
	if(ext=='png'){
		f="&f=png";
	}
	
	
	$(".image_group .currentImage").css('background-image', 'url("/phpThumb/phpThumb.php?src='+path+'&w=300&h=300'+f+'")');
	
	
	$(".image_group .preview").removeClass("active");
	$(element).addClass("active");
}