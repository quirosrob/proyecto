<?php ?>
<div class="sectionInfo">
	<div class='title'><?=$member['name']?></div>
	<div class='sports'>
		<?php
		foreach($member['sports'] as $sport){
			if(!empty($sport['image']['filename'])){
				$path="/img/uploads/{$sport['image']['filename']}";
				?>
				<div class='sportIcon' style='background-image: url("<?=$this->element('imageSrc', ['path'=>$path, 'w'=>50, 'h'=>50])?>");'></div>
				<?php
			}
			?>
			<?=$sport['name']?>
			<?php
		}
		?>
	</div>
	<div class='details'>
		<?php
		if(!empty($member['image']['filename'])){
			$path="/img/uploads/{$member['image']['filename']}";
			?>
			<div class='main-image-floating'>
				<img  src='<?=$this->element('imageSrcItemList', ['path'=>$path])?>' alt='' onclick="openImageZoom('<?=$path?>')"/>
			</div>
			<?php
		}
		?>
		<?=$member['biography']?>
	</div>
	
	<div class='year'><?=!empty($member['date_entry'])? date("Y", strtotime($member['date_entry'])) : ""?></div>
	
	<?=$this->element('image_group', ['images'=>$member['imageGroupItems']])?>
</div>