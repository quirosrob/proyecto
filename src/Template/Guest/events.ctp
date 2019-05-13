<?php ?>
<h3 class='text-center'>
    Noticias
</h3>

<?=$this->element('pagination')?>

<div class='itemList'>
	<?php
	foreach($events as $event){
		?>
		<div>
			<div class='itemListDetails'>
				<div class="info">
					<?php
					if(!empty($event['image']['filename'])){
						$path=UPLOADS_DIRECTORY_WEB."/{$event['image']['filename']}";
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
						<div class="name"><?=$event['name']?></div>
						<div class="date"><?=$event['date']?></div>
						<div class="description"><?=$event['description']?></div>
					</div>
				</div>
			</div>
			<div class="text-right">
				<a href="/Guest/Event/<?=$event['id']?>">
					<?=$this->element('buttonXs', ['label'=>"Detalles"])?>
				</a>
			</div>
		</div>
		<?php
    }
    ?>
</div>