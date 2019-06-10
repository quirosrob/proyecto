<?php ?>
<div class='image_group_admin'>
	<?php
	if(!empty($images)){
		?>
		<div class='previews'>
			<?php
			foreach($images as $image){
				if(!empty($image['filename'])){
					$path=UPLOADS_DIRECTORY_WEB."/{$image['filename']}";
					?>	
					<div class='preview' style='background-image: url("<?=$this->element('imageSrc', ['path'=>$path, 'w'=>60, 'h'=>60])?>");'>
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
				
				if(preg_match("/www\.youtube\.com\/watch\?v=(.*)/", $image['link'], $match)){
					?>
					<div class='preview' style=''>
						<iframe class="youtubeFrame" style="" src="https://www.youtube.com/embed/<?=$match[1]?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
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
			}
			?>
		</div>
		<?php
	}
	?>
</div>
