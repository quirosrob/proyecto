<?php ?>
<div class="formResponsive">
    <div>
		<div>Nueva Imagen</div>
		<div><input type='file' name='image' value=''/></div>
    </div>
</div>

<div class='text-center'>
    <?=$this->element('button', ['label'=>"Agregar"])?>
</div>
<br/>

<?=$this->element('image_group', [
	'images'=>[
		['path'=>"/img/members/094.jpg"],
		['path'=>"/img/members/094.jpg"],
		['path'=>"/img/members/094.jpg"],
		['path'=>"/img/members/094.jpg"],
		['path'=>"/img/members/094.jpg"],
		['path'=>"/img/members/094.jpg"],
		['path'=>"/img/members/094.jpg"],
		['path'=>"/img/members/094.jpg"],
		['path'=>"/img/members/094.jpg"],
		['path'=>"/img/members/094.jpg"],
		['path'=>"/img/members/094.jpg"],
	],
	'deleteImage'=>true
])?>