<?php ?>
<h3 class='text-center'>
    <?=$gallery['name']?>
</h3>
<div class="sectionInfo">
    <?php
	if(!empty($gallery['image']['filename'])){
		$path="/img/uploads/{$gallery['image']['filename']}";
		?>
		<div class='main_image' style='background-image: url("<?=$this->element('imageSrcItemList', ['path'=>$path])?>");' onclick="openImageZoom('<?=$path?>')"></div>
		<?php
	}
	?>
	<div class='details'>
		<?=$gallery['description']?>
    </div>
	
	<?=$this->element('image_group', ['images'=>$gallery['imageGroupItems']])?>
</div>