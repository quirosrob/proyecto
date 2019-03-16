<?php ?>
<div class="text-right">
    <a href='/Guess/Members/?sport_id=<?=$sport['id']?>'>
		<?=$this->element('buttonXs', ['label'=>'Miembros'])?>
    </a>
</div>
<h3 class='text-center'><?=$sport['name']?></h3>
<div class="sectionInfo">
    <?php
	if(!empty($sport['image']['filename'])){
		$path="/img/uploads/{$sport['image']['filename']}";
		?>
		<div class='main_image' style='background-image: url("<?=$this->element('imageSrcItemList', ['path'=>$path])?>");' onclick="openImageZoom('<?=$path?>')"></div>
		<?php
	}
	?>
	<div class='details'><?=$sport['description']?></div>
	<?=$this->element('image_group', ['images'=>$sport['imageGroupItems']])?>
</div>