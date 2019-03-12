<?php ?>
<div class='image_group'>
	<?php
	foreach($images as $image){
		?>
		<div class='item' style='background-image: url("<?=$this->element('imageSrc', ['path'=>$image['path'], 'w'=>200, 'h'=>200])?>");' onclick="openImageZoom('<?=$image['path']?>');">
			<?php
			if(@$deleteImage){
				?>
				<div class='deleteImageButtonWrap text-right'>
					<button type="button" class="btn btn-xs btn-danger">
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