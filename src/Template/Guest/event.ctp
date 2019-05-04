<?php ?>
<div class="sectionInfo">
	<div class='title'><?=$event['name']?></div>
    <div class='details'>
		<?php
		if(!empty($event['image']['filename'])){
			$path="/img/uploads/{$event['image']['filename']}";
			?>
			<div class='main-image-floating'>
				<img  src='<?=$this->element('imageSrcItemList', ['path'=>$path])?>' alt='' onclick="openImageZoom('<?=$path?>')"/>
			</div>
			<?php
		}
		?>
		<?=$event['description']?>
    </div>
	<?=$this->element('image_group', ['images'=>$event['imageGroupItems']])?>
</div>

<?=$this->element('facebookComments')?>