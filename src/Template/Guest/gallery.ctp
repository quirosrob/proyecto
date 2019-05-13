<?php ?>
<div class="sectionInfo">
	<div class='title'><?=$gallery['name']?></div>
	<div class='details'>
		<?php
		if(!empty($gallery['image']['filename'])){
			$path=UPLOADS_DIRECTORY_WEB."/{$gallery['image']['filename']}";
			?>
			<div class='main-image-floating'>
				<img  src='<?=$this->element('imageSrcItemList', ['path'=>$path])?>' alt='' onclick="openImageZoom('<?=$path?>')"/>
			</div>
			<?php
		}
		?>
		<?=$gallery['description']?>
    </div>
	<?=$this->element('image_group', ['images'=>$gallery['imageGroupItems']])?>
</div>
<?=$this->element('facebookComments')?>