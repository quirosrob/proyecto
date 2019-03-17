function setFormsSubmitEvent(){
	$("form.ajax").unbind('submit');
	$("form.ajax").submit(function(e){
		e.preventDefault();
		var form=$(this);
		var question=form.attr("question");
		
		if(question!=null){
			openAlertYesNo(question, function(response){
				if(response){
					submitForm(form);
				}
			});
		}
		else{
			submitForm(form);
		}
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