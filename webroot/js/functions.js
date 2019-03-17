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
	openModal("#modal-ajax-block");
	queryServerJson(
		'/Admin/removeImageFromGroup/'+image_id, 
		{}, 
		function(data){
			if(data['status']=='ok'){
				$(element).parents('.item').first().remove();
			}
		}, 
		function(){
			closeModal("#modal-ajax-block");
		}, 
		null
	);
}