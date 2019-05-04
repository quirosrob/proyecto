<?php ?>
<div class="text-right">
    <a href='/Guest/Members/?sport_id=<?=$sport['id']?>'>
		<?=$this->element('buttonXs', ['label'=>'Miembros'])?>
    </a>
</div>
<div class="sectionInfo">
	<div class='title'><?=$sport['name']?></div>
	<div class='details'>
		<?php
		if(!empty($sport['image']['filename'])){
			$path="/img/uploads/{$sport['image']['filename']}";
			?>
			<div class='main-image-floating'>
				<img  src='<?=$this->element('imageSrcItemList', ['path'=>$path])?>' alt='' onclick="openImageZoom('<?=$path?>')"/>
			</div>
			<?php
		}
		?>
		<?=$sport['description']?>
	</div>
	<?=$this->element('image_group', ['images'=>$sport['imageGroupItems']])?>
</div>

<?=$this->element('styleSportColor', ['color'=>$sport['color']])?>