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
		toolbar1: 'undo redo | styleselect | forecolor backcolor bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent'
	});
}

function openImageZoom(path){
	$("#imageZoom .imageZoom").css('background-image', 'url("/phpThumb/phpThumb.php?src='+path+'&w=500&h=500")');
	openModal("#imageZoom");
}