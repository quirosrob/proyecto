function setFormsSubmitEvent(){
	$("form.ajax").unbind('submit');
	$("form.ajax").submit(function(e){
		e.preventDefault();
		submitForm($(this));
	});
}

function submitForm(form){
	var url=$(location).attr('href');
	var target="#mainBodyPadding";
	var formData = new FormData($(form)[0]);
	openModal("#modal-ajax-block");
	
	queryServerFormData(url, formData, 'html', function(html){
		$(target).html(html);
		setFormsSubmitEvent();
		setTimeout(function(){
			closeModal("#modal-ajax-block");
		}, 1000);
	}, 
	null, 
	null);
}