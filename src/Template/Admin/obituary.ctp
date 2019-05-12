<?php ?>
<h3 class='text-center'>
    Obituario
</h3>
<form class='ajax'>
	<div class="formResponsive">
		<div>
			<div>Titulo</div>
			<div><input class='form-control' type='text' name='member_obituary_title' value='<?=$member_obituary_title?>'/></div>
		</div>
	</div>
	<textarea class='richTextArea' name='member_obituary_description'><?=$member_obituary_description?></textarea>
	<br/>
	<div class='text-center'>
		<input type='hidden' name='formAction' value='updateObituary'/>
		<?=$this->element('button', ['label'=>"Salvar"])?>
	</div>
	
	<h4>Automáticos</h4>
	<div><strong>{NOMBRE}</strong>: nombre</div>
	<div><strong>{AÑO_NACIMIENTO}</strong>: año de nacimiento</div>
	<div><strong>{AÑO_MUERTE}</strong>: año de muerte</div>
	<div><strong>{DEPORTES}</strong>: deporte asignados</div>
</form>

<script>
	makeRichtTextAreas();
</script>