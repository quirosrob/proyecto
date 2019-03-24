<?php ?>
<h3 class='text-center'>
    <?=$directors_team['name']?>
</h3>
<div class="sectionInfo">
	<?php
	if(!empty($directors_team['image']['filename'])){
		$path="/img/uploads/{$directors_team['image']['filename']}";
		?>
		<div class='main_image' style='background-image: url("<?=$this->element('imageSrcItemList', ['path'=>$path])?>");' onclick="openImageZoom('<?=$path?>')"></div>
		<?php
	}
	?>
	
    <div class='details'>
		<?=$directors_team['description']?>
    </div>
		
	<?=$this->element('image_group', ['images'=>$directors_team['imageGroupItems']])?>
</div>