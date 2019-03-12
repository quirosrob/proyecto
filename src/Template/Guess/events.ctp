<?php ?>
<h3 class='text-center'>
    Noticias
</h3>
<div class='itemList'>
	<?php
	foreach($events as $event){
		?>
		<div>
			<div class='itemListDetails'>
				<div class="info">
					<div class='main_image' style='background-image: url("<?=$this->element('imageSrcItemList', ['path'=>"/img/events/diaDeporte.jpg"])?>");' onclick="openImageZoom('/img/events/diaDeporte.jpg')"></div>
					<div class='details'>
						<div class="name"><?=$event['name']?></div>
						<div class="date"><?=$event['date']?></div>
						<div class="description"><?=$event['description']?></div>
					</div>
				</div>
			</div>
			<div class="text-right">
				<a href="/Guess/Event/<?=$event['id']?>">
					<?=$this->element('buttonXs', ['label'=>"Detalles"])?>
				</a>
			</div>
		</div>
		<?php
    }
    ?>
</div>