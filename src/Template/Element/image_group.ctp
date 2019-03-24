<?php ?>
<div class='image_group'>
	<?php
	if(!empty($images)){
		?>
		<h3 class='text-center'>Imagenes</h3>
		<div class='currentImage'></div>
		<div class='previews'>
			<?php
<<<<<<< HEAD
=======
			for($i=0; $i<29; $i++)
>>>>>>> 1dde1e4758faf028a40c37870808b193a3bd2cac
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