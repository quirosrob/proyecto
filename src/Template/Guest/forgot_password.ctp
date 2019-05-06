<?php ?>
<form class='ajax'>
	<div class="formResponsive">
		<div>
			<div>Correo Electrónico</div>
			<div><input class='form-control' type='text' name='email' value=''/></div>
		</div>
	</div>

	<div class='text-center'>
		<input type='hidden' name='formAction' value='sentRestartPasswordLink'/>
		<?=$this->element('button', ['label'=>"Reniciar"])?>
	</div>
</form>