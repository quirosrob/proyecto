<?php ?>
<h3 class='text-center'>Nueva Noticia</h3>

<form class='ajax'>
	<div class="formResponsive">
		<div>
			<div>Nombre</div>
			<div><input class='form-control' type='text' name='name' value=''/></div>
		</div>
		<div>
			<div>Fecha</div>
			<div><input class='form-control' type='text' name='date' value=''/></div>
		</div>
		<div>
			<div>Imagen</div>
			<div>
				<input type='file' name='image' value=''/>
			</div>
		</div>
	</div>

	<h3 class='text-center'>Descripción</h3>
	<textarea name='description' class='richTextArea'></textarea>
	<br/>
	<div class='text-center'>
		<input type='hidden' name='formAction' value='addEvent'/>
		<?=$this->element('button', ['label'=>"Salvar"])?>
	</div>
</form>


<script>
	makeRichtTextAreas();
</script>