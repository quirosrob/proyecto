<?php ?>
<div class='image_group'>
	<?php
	if(!empty($images)){
		foreach($images as $image){
			if(isset($image['filename'])){
				$path="/img/uploads/{$image['filename']}";
				?>
				<div class='item' style='background-image: url("<?=$this->element('imageSrc', ['path'=>$path, 'w'=>200, 'h'=>200])?>");' onclick="openImageZoom('<?=$path?>');">
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
		}
	}
	?>
</div>