<?php ?>
<div class="modal fade" id='modal-date-picker' tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<center>
					<input type='text' id="dateSelector" />
				</center>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" onclick="datePickerRetrive()">Aceptar</button>
			</div>
		</div>
	</div>
</div>

<script>
	var datePickerElement=null;
	function openDatePicker(element){
		datePickerElement=$(element).parents('.inputDateWrap').find('.inputDate');
		$("#dateSelector").val($(datePickerElement).val());
		$("#dateSelector").click();
		openModal('#modal-date-picker');
	}
	function clearDatePicker(element){
		$(element).parents('.inputDateWrap').find('.inputDate').val("");
	}
	function datePickerRetrive(){
		$(datePickerElement).val($("#dateSelector").val());
		closeModal('#modal-date-picker');
	}
	$("#dateSelector").AnyTime_picker({
		hideInput: true,
		placement: "inline",
		labelYear: "Año",
		labelMonth: "Mes",
		labelDayOfMonth: "Día del Mes",
		labelHour: "Hora",
		labelMinute: "Minuto",
		dayAbbreviations: ["Do","Lu","Ma","Mi","Ju","Vi","Sa"],
		monthAbbreviations: ["Ene","Feb","Mar","Abr","May","Jun","Jul","Ago","Set","Oct","Nov","Dic"],
		labelTitle:"Seleccione la Fecha",
		format: "%Y-%m-%d"
	});
	
	$("#modal-date-picker .AnyTime-dom-body .AnyTime-dom-btn").dblclick(datePickerRetrive);
</script>