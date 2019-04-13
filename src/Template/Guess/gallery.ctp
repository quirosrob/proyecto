<?php ?>
<div class="sectionInfo">
	<div class='title'><?=$gallery['name']?></div>
	<div class='details'>
		<?php
		if(!empty($gallery['image']['filename'])){
			$path="/img/uploads/{$gallery['image']['filename']}";
			?>
			<div class='main-image-floating'>
				<img  src='<?=$this->element('imageSrcItemList', ['path'=>$path])?>' alt=''/>
			</div>
			<?php
		}
		?>
		<?=$gallery['description']?>
    </div>
	<?=$this->element('image_group', ['images'=>$gallery['imageGroupItems']])?>
</div>