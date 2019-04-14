<?php ?>
<h3 class='text-center'>Nuevo Deporte</h3>

<form class='ajax'>
	<div class="formResponsive">
		<div>
			<div>Nombre</div>
			<div><input class='form-control' type='text' name='name' value=''/></div>
		</div>
		<div>
			<div>Color</div>
			<div><input type='text' class='colorPicker' name='color' value='' /></div>
		</div>
		<div>
			<div>Imagen</div>
			<div>
				<input type='file' name='image' value=''/>
			</div>
		</div>
	</div>

	<textarea name='description' class='richTextArea'></textarea>

	<br/>
	<div class='text-center'>
		<input type='hidden' name='formAction' value='addSport'/>
		<?=$this->element('button', ['label'=>"Salvar"])?>
	</div>
</form>
<script>
	makeRichtTextAreas();
	
	$('.colorPicker').spectrum({
		preferredFormat: "hex",
		flat: false,
		showInput: false,
		allowEmpty:true,
		showSelectionPalette: true,
		cancelText: "Cancelar",
		chooseText: "Ok"
	});
</script>