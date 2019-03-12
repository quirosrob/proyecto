<?php ?>
<div class="text-right">
    <a href='/Admin/EventGalery/1'>
		<?=$this->element('buttonXs', ['label'=>'Galería'])?>
    </a>
</div>
<form class='ajax'>
	<div class="sectionInfo">
		<div class='main_image' style='background-image: url("<?=$this->element('imageSrcItemList', ['path'=>"/img/events/diaDeporte.jpg"])?>");' onclick="openImageZoom('/img/events/diaDeporte.jpg')"></div>

		<div class="formResponsive">
			<div>
				<div>Nombre</div>
				<div><input class='form-control' type='text' name='name' value='<?=$event['name']?>'/></div>
			</div>
			<div>
				<div>Fecha</div>
				<div><input class='form-control' type='text' name='date' value='<?=$event['date']?>'/></div>
			</div>
			<div>
				<div>Imagen</div>
				<div>

					<input type='file' name='image_id' value=''/>
				</div>
			</div>
		</div>

		<h3 class='text-center'>Descripción</h3>
		<textarea class='richTextArea' name='description'><?=$event['description']?></textarea>
		<br/>
		<div class='text-center'>
			<input type='hidden' name='formAction' value='updateEvent'/>
			<?=$this->element('button', ['label'=>"Salvar"])?>
		</div>
	</div>
</form>
<script>
	makeRichtTextAreas();
</script>