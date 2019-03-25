<?php ?>
<div class='image_group'>
	<?php
	if(!empty($images)){
		?>
		<h3 class='text-center'>Imagenes</h3>
		<div class='currentImage'></div>
		<div class='previews'>
			<?php
			foreach($images as $image){
				$path="/img/uploads/{$image['filename']}";
				?>	
				<div class='preview' style='background-image: url("<?=$this->element('imageSrc', ['path'=>$path, 'w'=>60, 'h'=>60])?>");' onclick="setCurrentImageImageGroup(this, '<?=$path?>');">
					<?php
					if(@$deleteImage){
						?>
						<div class='deleteImageButtonWrap text-right'>
							<button type="button" class="btn btn-xs btn-danger" onclick="stopPropagation(event);removeImageFromGroup(this, <?=$image['id']?>);">
								<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
							</button>
						</div>
						<?php
					}
					?>
				</div>
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