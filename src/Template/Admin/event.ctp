<?php ?>
<div class="text-right">
    <a href='/Admin/EventGalery/1'>
		<?=$this->element('buttonXs', ['label'=>'Galería'])?>
    </a>
</div>

<div class="sectionInfo">
	<div class='main_image' style='background-image: url("<?=$this->element('imageSrcItemList', ['path'=>"/img/events/diaDeporte.jpg"])?>");' onclick="openImageZoom('/img/events/diaDeporte.jpg')"></div>
	
	<div class="formResponsive">
		<div>
			<div>Nombre</div>
			<div><input class='form-control' type='text' name='name' value='Celebración del Día del Deporte'/></div>
		</div>
		<div>
			<div>Fecha</div>
			<div><input class='form-control' type='text' name='name' value='25 de marzo 2019'/></div>
		</div>
		<div>
			<div>Imagen</div>
			<div>

				<input type='file' name='image_id' value=''/>
			</div>
		</div>
	</div>

	<h3 class='text-center'>Descripción corta</h3>
	<textarea class='richTextArea' name='short_descr'>
		<p>
		Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
		</p>
	</textarea>

	<h3 class='text-center'>Detalles</h3>
	<textarea class='richTextArea' name='detail'>
		<p>
		Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
		</p>
		<p>
		Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
		</p>
		<p>
		Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
		</p>
	</textarea>
	<br/>
	<div class='text-center'>
		<?=$this->element('button', ['label'=>"Salvar"])?>
	</div>
</div>

<script>
	makeRichtTextAreas();
</script>