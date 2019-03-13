<?php ?>
<h3 class='text-center'>
    <?=$event['name']?>
</h3>
<div class="sectionInfo">
	<?php
	if(!empty($event['image']['filename'])){
		$path="/img/uploads/{$event['image']['filename']}";
		?>
		<div class='main_image' style='background-image: url("<?=$this->element('imageSrcItemList', ['path'=>$path])?>");' onclick="openImageZoom('<?=$path?>')"></div>
		<?php
	}
	?>
	
    <div class='details'>
		<?=$event['description']?>
    </div>
		
	<?=$this->element('image_group', ['images'=>$event['imageGroupItems']])?>
</div>