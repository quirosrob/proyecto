<?php ?>
<form class='ajax'>
	<div class="formResponsive">
		<div>
			<div>Nueva Imagen</div>
			<div><input type='file' name='images[]' value='' multiple/></div>
		</div>
	</div>

	<div class='text-center'>
		<input type='hidden' name='formAction' value='addImageToGallery'/>
		<?=$this->element('button', ['label'=>"Agregar"])?>
	</div>
</form>
<br/>

<?=$this->element('image_group_admin', ['images'=>$gallery['imageGroupItems'],'deleteImage'=>true])?>