<?php ?>
<h2 class='text-center'>Textos</h2>
<form class="ajax">
	<div class="formResponsive">
		<div>
			<div>Título</div>
			<div><input class='form-control' type='text' name='site_title' value='<?=$site_title?>'/></div>
		</div>
		<div>
			<div>Título abreviado</div>
			<div><input class='form-control' type='text' name='site_title_short' value='<?=$site_title_short?>'/></div>
		</div>
		<div>
			<div>Pie de página</div>
			<div>
				<textarea class="form-control" style="height: 150px;" name='site_footer'><?=$site_footer?></textarea>
			</div>
		</div>
	</div>

	<h2 class='text-center'>Imagenes</h2>

	<div class="formResponsive">
		<div>
			<div>Logo</div>
			<div>
				<div class='logo_image' style='background-image: url(<?=$this->element('imageSrc', ['path'=>"/img/uploads/{$site_logo_image['filename']}", 'w'=>100, 'h'=>100])?>);'></div>
				<input type='file' name='logo' />
			</div>
		</div>
		<div>
			<div>Logo 2</div>
			<div>
				<div class='logo_image' style='background-image: url(<?=$this->element('imageSrc', ['path'=>"/img/uploads/{$site_logo2_image['filename']}", 'w'=>100, 'h'=>100])?>);'></div>
				<input type='file' name='logo2' />
			</div>
		</div>
	</div>

	<div class='text-center'>
		<input type='hidden' name='formAction' value='updateConfiguration'/>
		<?=$this->element('button', ['label'=>"Salvar"])?>
	</div>

</form>


<br/>
<form class="ajax">
	<div class='text-center'>
		<input type='hidden' name='formAction' value='createBackup'/>
		<?=$this->element('button', ['label'=>"Gnerar Respaldo"])?>
	</div>
</form>

<script>
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