<?php ?>
<h3 class='text-center'>Nueva Junta Directiva</h3>

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

<textarea name='detail' class='richTextArea'></textarea>

<br/>
<div class='text-center'>
    <?=$this->element('button', ['label'=>"Salvar"])?>
</div>

<script>
	makeRichtTextAreas();
</script>