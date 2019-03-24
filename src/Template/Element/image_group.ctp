<?php ?>
<div class='image_group'>
	<?php
	if(!empty($images)){
		?>
		<h3 class='text-center'>Imagenes</h3>
		<div class='currentImage'></div>
		<div class='previews'>
			<?php
			for($i=0; $i<29; $i++)
			foreach($images as $image){
				$path="/img/uploads/{$image['filename']}";
				?>	
				<div class='preview' style='background-image: url("<?=$this->element('imageSrc', ['path'=>$path, 'w'=>30, 'h'=>30])?>");' onclick="setCurrentImageImageGroup(this, '<?=$path?>');"></div>
				<?php
			}
			?>
		</div>
		<?php
	}
	?>
</div>
<script>
	$(".image_group .preview").first().click();
</script>