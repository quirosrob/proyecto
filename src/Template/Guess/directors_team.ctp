<?php ?>
<div class="sectionInfo">
	<div class='title'><?=$directors_team['name']?></div>
    <div class='details'>
		<?php
		if(!empty($directors_team['image']['filename'])){
			$path="/img/uploads/{$directors_team['image']['filename']}";
			?>
			<div class='main-image-floating'>
				<img  src='<?=$this->element('imageSrcItemList', ['path'=>$path])?>' alt=''/>
			</div>
			<?php
		}
		?>
		<?=$directors_team['description']?>
    </div>
		
	<?=$this->element('image_group', ['images'=>$directors_team['imageGroupItems']])?>
</div>