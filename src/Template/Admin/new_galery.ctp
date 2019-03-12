<?php ?>

<h3 class='text-center'>Nueva Galería</h3>

<div class="formResponsive">
    <div>
		<div>Nombre</div>
		<div><input class='form-control' type='text' name='name' value=''/></div>
    </div>
    <div>
		<div>Imagen</div>
		<div>

			<input type='file' name='image_id' value=''/>
		</div>
    </div>
</div>
<h3 class='text-center'>Descripción corta</h3>
<textarea name='short_descr' class='richTextArea'></textarea>

<h3 class='text-center'>Detalles</h3>
<textarea name='detail' class='richTextArea'></textarea>

<br/>
<div class='text-center'>
    <?=$this->element('button', ['label'=>"Salvar"])?>
</div>

<script>
	makeRichtTextAreas();
</script>