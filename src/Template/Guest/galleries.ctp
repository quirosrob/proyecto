<?php ?>
<h3 class='text-center'>
    Galerías
</h3>

<?=$this->element('pagination')?>

<div class='itemList'>
    <?php
    foreach($galleries as $gallery){
		?>
		<div>
			<div class='itemListDetails'>
				<div class="info">
					<?php
					if(!empty($gallery['image']['filename'])){
						$path="/img/uploads/{$gallery['image']['filename']}";
						?>
						<div class='main_image' style='background-image: url("<?=$this->element('imageSrcItemList', ['path'=>$path])?>");' onclick="openImageZoom('<?=$path?>')"></div>
						<?php
					}
					else{
						?>
						<div class='main_image'></div>
						<?php
					}
					?>
					<div class='details'>
						<div class="name"><?=$gallery['name']?></div>
						<div class="description"><?=$gallery['description']?></div>
					</div>
				</div>
			</div>
			<div class="text-right">
				<a href="/Guest/Gallery/<?=$gallery['id']?>">
					<?=$this->element('buttonXs', ['label'=>"Detalles"])?>
				</a>
			</div>
		</div>
		<?php
    }
    ?>
</div>