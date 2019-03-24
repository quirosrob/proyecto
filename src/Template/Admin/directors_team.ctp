<?php ?>
<div class="text-right">
    <a href='/Admin/DirectorsTeamGallery/<?=$directors_team['id']?>'>
		<?=$this->element('buttonXs', ['label'=>'Galería'])?>
    </a>
</div>

<form class='ajax'>
	<div class="sectionInfo">
		
		<?php
		if(!empty($directors_team['image']['filename'])){
			$path="/img/uploads/{$directors_team['image']['filename']}";
			?>
			<div class='main_image' style='background-image: url("<?=$this->element('imageSrcItemList', ['path'=>$path])?>");' onclick="openImageZoom('<?=$path?>')"></div>
			<?php
		}
		?>

		<div class="formResponsive">
			<div>
				<div>Nombre</div>
				<div><input class='form-control' type='text' name='name' value='<?=$directors_team['name']?>'/></div>
			</div>
			<div>
				<div>Imagen</div>
				<div>
					<input type='file' name='image' value=''/>
				</div>
			</div>
		</div>

		<h3 class='text-center'>Descripción</h3>
		<textarea class='richTextArea' name='description'><?=$directors_team['description']?></textarea>
		<br/>
		<div class='text-center'>
			<input type='hidden' name='formAction' value='updateDirectorsTeam'/>
			<?=$this->element('button', ['label'=>"Salvar"])?>
		</div>
	</div>
</form>
<script>
	makeRichtTextAreas();
</script>