<?php ?>
<div class="text-right">
    <a href='/Admin/GalleryImages/<?=$gallery['id']?>'>
		<?=$this->element('buttonXs', ['label'=>'Galería'])?>
    </a>
</div>
<form class='ajax'>
	<div class="sectionInfo">
		
		<?php
		if(!empty($gallery['image']['filename'])){
			$path="/img/uploads/{$gallery['image']['filename']}";
			?>
			<div class='main_image' style='background-image: url("<?=$this->element('imageSrcItemList', ['path'=>$path])?>");' onclick="openImageZoom('<?=$path?>')"></div>
			<?php
		}
		?>
		
		<div class="formResponsive">
			<div>
				<div>Nombre</div>
				<div><input class='form-control' type='text' name='name' value='<?=$gallery['name']?>'/></div>
			</div>
			<div>
				<div>Imagen</div>
				<div>
					<input type='file' name='image' value=''/>
				</div>
			</div>
		</div>

		<h3 class='text-center'>Descripción</h3>
		<textarea class='richTextArea' name='description'><?=$gallery['description']?></textarea>
		<br/>
		<div class='text-center'>
			<input type='hidden' name='formAction' value='updateGallery'/>
			<?=$this->element('button', ['label'=>"Salvar"])?>
		</div>
	</div>
</form>

<script>
	makeRichtTextAreas();
</script>