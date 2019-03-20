<?php ?>
<div class="text-right">
    <a href='/Admin/SportGalery/<?=$sport['id']?>'>
		<?=$this->element('buttonXs', ['label'=>'Galería'])?>
    </a>
</div>
<form class='ajax'>
	<div class="sectionInfo">
		<?php
		if(!empty($sport['image']['filename'])){
			$path="/img/uploads/{$sport['image']['filename']}";
			?>
			<div class='main_image' style='background-image: url("<?=$this->element('imageSrcItemList', ['path'=>$path])?>");' onclick="openImageZoom('<?=$path?>')"></div>
			<?php
		}
		?>

		<div class="formResponsive">
			<div>
				<div>Nombre</div>
				<div><input class='form-control' type='text' name='name' value='<?=$sport['name']?>'/></div>
			</div>
			<div>
				<div>Imagen</div>
				<div>
					<input type='file' name='image' value=''/>
				</div>
			</div>
		</div>

		<h3 class='text-center'>Descripción</h3>
		<textarea class='richTextArea' name='description'><?=$sport['description']?></textarea>
		<br/>
		<div class='text-center'>
			<input type='hidden' name='formAction' value='updateSport'/>
			<?=$this->element('button', ['label'=>"Salvar"])?>
		</div>
	</div>
</form>
<script>
	makeRichtTextAreas();
</script>