<?php ?>
<h3 class='text-center'>
    <?=$event['name']?>
</h3>
<div class="sectionInfo">
    <div class='main_image' style='background-image: url("<?=$this->element('imageSrcMainImage', ['path'=>"/img/events/diaDeporte.jpg"])?>");' onclick="openImageZoom('/img/events/diaDeporte.jpg')"></div>
	
    <div class='details'>
		<?=$event['description']?>
    </div>
    <?=$this->element('image_group', ['images'=>[
		['path'=>"/img/events/diaDeporte.jpg"],
		['path'=>"/img/events/diaDeporte.jpg"],
		['path'=>"/img/events/diaDeporte.jpg"],
		['path'=>"/img/events/diaDeporte.jpg"],
		['path'=>"/img/events/diaDeporte.jpg"],
		['path'=>"/img/events/diaDeporte.jpg"],
		['path'=>"/img/events/diaDeporte.jpg"],
	]])?>
</div>