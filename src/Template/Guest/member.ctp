<?php ?>
<div class="sectionInfo">
	<div class='title'><?=$member['name']?></div>
	<div class='sports sportsList'>
		<?php
		foreach($member['sports'] as $sport){
			if(!empty($sport['image']['filename'])){
				$path=UPLOADS_DIRECTORY_WEB."/{$sport['image']['filename']}";
				?>
				<div class='sportIcon' style='background-image: url("<?=$this->element('imageSrc', ['path'=>$path, 'w'=>50, 'h'=>50])?>");'></div>
				<?php
			}
			?>
			<div><?=$sport['name']?></div>
			<?php
		}
		?>
	</div>
	<div class='years_live'>
		<?php
		if(!empty($member['year_birth']) && !empty($member['year_death'])){
			?>
			(<?=$member['year_birth']?>-<?=$member['year_death']?>)
			<?php
		}
		else if(!empty($member['year_birth'])){
			?>
			(nació en <?=$member['year_birth']?>)
			<?php
		}
		else if(!empty($member['year_death'])){
			?>
			(murió en <?=$member['year_death']?>)
			<?php
		}
		?>
	</div>
	<div class='details'>
		<?php
		if(!empty($member['image']['filename'])){
			$path=UPLOADS_DIRECTORY_WEB."/{$member['image']['filename']}";
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
	
	<?php
	if(!empty($member['number'])){
		?>
		<div class='number'>No. <?=$member['number']?></div>
		<?php
	}
	?>
	
	<?=$this->element('image_group', ['images'=>$member['imageGroupItems']])?>
</div>

<?php
foreach($member['sports'] as $sport){
	?>
	<?=$this->element('styleSportColor', ['color'=>$sport['color']])?>
	<?php
	break;
}
?>
<?=$this->element('facebookComments')?>