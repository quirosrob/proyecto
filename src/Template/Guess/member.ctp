<?php ?>
<h3 class='text-center'><?=$member['name']?></h3>
<div class="sectionInfo">
	<div class='year'><?=!empty($member['date_entry'])? date("Y", strtotime($member['date_entry'])) : ""?></div>
	<div class='sports'>
		<?php
		foreach($member['sports'] as $sport){
			if(!empty($sport['image']['filename'])){
				$path="/img/uploads/{$sport['image']['filename']}";
				?>
				<div class='sportIcon' style='background-image: url("<?=$this->element('imageSrc', ['path'=>$path, 'w'=>30, 'h'=>30])?>");'></div>
				<?php
			}
			?>
			<?=$sport['name']?>
			<?php
		}
		?>
	</div>
    <?php
	if(!empty($member['image']['filename'])){
		$path="/img/uploads/{$member['image']['filename']}";
		?>
		<div class='main_image' style='background-image: url("<?=$this->element('imageSrcItemList', ['path'=>$path])?>");' onclick="openImageZoom('<?=$path?>')"></div>
		<?php
	}
	?>
    <div class='details'><?=$member['biography']?></div>
	<?=$this->element('image_group', ['images'=>$member['imageGroupItems']])?>
</div>