<?php ?>
<div class='image_group_admin'>
	<?php
	if(!empty($images)){
		?>
		<div class='previews'>
			<?php
			foreach($images as $image){
				$path="/img/uploads/{$image['filename']}";
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
			?>
		</div>
		<?php
	}
	?>
</div>
