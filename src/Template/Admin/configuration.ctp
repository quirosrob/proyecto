<?php ?>
<div class='text-right'>
	<a href='/Admin/DownloadBackupMenu/'>
		<?=$this->element('buttonSm', ['label'=>"Generar Backup"])?>
	</a>
    <a href='/Admin/UploadBackupMenu/'>
		<?=$this->element('buttonSm', ['label'=>"Restaurar Backup"])?>
    </a>
</div>

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
		<div>
			<div>Bienvenida</div>
			<div>
				<textarea class="form-control" style="height: 150px;" name='site_welcome'><?=$site_welcome?></textarea>
			</div>
		</div>
	</div>

	<h2 class='text-center'>Facebook</h2>
	<div class="formResponsive">
		<div>
			<div>App Id</div>
			<div><input class='form-control' type='text' name='facebook_appId' value='<?=$facebook_appId?>'/></div>
		</div>
	</div>
	
	<h2 class='text-center'>Reglamento</h2>
	
	<div class="formResponsive">
		<div>
			<div>Archivo</div>
			<div>
				<input type='file' name='site_rules_file' />
			</div>
		</div>
	</div>
	
	<h2 class='text-center'>Imagenes</h2>

	<div class="formResponsive">
		<div>
			<div>Logo</div>
			<div>
				<div class='logo_image' style='background-image: url(<?=$this->element('imageSrc', ['path'=>UPLOADS_DIRECTORY_WEB."/{$site_logo_image['filename']}", 'w'=>100, 'h'=>100])?>);'></div>
				<input type='file' name='logo' />
			</div>
		</div>
		<div>
			<div>Logo 2</div>
			<div>
				<div class='logo_image' style='background-image: url(<?=$this->element('imageSrc', ['path'=>UPLOADS_DIRECTORY_WEB."/{$site_logo2_image['filename']}", 'w'=>100, 'h'=>100])?>);'></div>
				<input type='file' name='logo2' />
			</div>
		</div>
		<div>
			<div>Imagen Inicio</div>
			<div>
				<div class='logo_image' style='background-image: url(<?=$this->element('imageSrc', ['path'=>UPLOADS_DIRECTORY_WEB."/{$site_welcome_image['filename']}", 'w'=>100, 'h'=>100])?>);'></div>
				<input type='file' name='site_welcome_image' />
			</div>
		</div>
	</div>

	<div class='text-center'>
		<input type='hidden' name='formAction' value='updateConfiguration'/>
		<?=$this->element('button', ['label'=>"Salvar"])?>
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