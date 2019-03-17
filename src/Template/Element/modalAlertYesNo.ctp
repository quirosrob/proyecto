<?php ?>
<div class="modal fade" id='modal-alert-yes-no' tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class='text-danger' style="margin: 0; padding: 0;">
					<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				</h3>
			</div>
			<div class="modal-body">
				<div class="text-center">
					<h4 class="question"></h4>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-success" onclick="alertYesNoReturn(true)">Aceptar</button>
				<button type="button" class="btn btn-danger" onclick="alertYesNoReturn(false)">Cancelar</button>
			</div>
		</div>
	</div>
</div>

<script>
	var alertYesNoCallback=null;
	function alertYesNoReturn(response){
		closeModal("#modal-alert-yes-no");
		if(typeof(alertYesNoCallback)==='function'){
			alertYesNoCallback(response);
		}
	}
	function openAlertYesNo(question, callback){
		$("#modal-alert-yes-no .question").html(question);
		alertYesNoCallback=callback;
		openModal("#modal-alert-yes-no");
	}
</script>