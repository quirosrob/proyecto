function queryServerJson(url, data, successCallback, completeCallback, errorCallback){
	queryServerAux(url, data, 'json', successCallback, completeCallback, errorCallback, false);
}

function queryServerHtml(url, data, successCallback, completeCallback, errorCallback){
	queryServerAux(url, data, 'html', successCallback, completeCallback, errorCallback, false);
}

function queryServer(url, data, dataType, successCallback, completeCallback, errorCallback){
	queryServerAux(url, data, dataType, successCallback, completeCallback, errorCallback, false);
}

function queryServerFormData(url, formData, dataType, successCallback, completeCallback, errorCallback){
	queryServerAux(url, formData, dataType, successCallback, completeCallback, errorCallback, true);
}

function queryServerAux(url, data, dataType, successCallback, completeCallback, errorCallback, form){
	var params={
		type: "POST",
		url: url,
		data: data,
		dataType: dataType,
		success: successCallback,
		complete: completeCallback,
		cache: false,
		timeout: 0,
		error: function(e){
			if(typeof(errorCallback)=='function')
				errorCallback(e);
		}
	}
	if(form){
		params['processData']=false;
		params['contentType']=false;
	}
	
	$.ajax(params);
}