<?php ?>
<h3 class="text-center">Contáctenos</h3>

<form class='ajax'>
	<div class="formResponsive">
		<div>
			<div>Correo</div>
			<div><input class='form-control' type='text' name='contact_us_email' value='<?=$contact_us_email?>'/></div>
		</div>

		<div>
			<div>Teléfono</div>
			<div><input class='form-control' type='tel' name='contact_us_phone' value='<?=$contact_us_phone?>'/></div>
		</div>
		<div>
			<div>Dirección</div>
			<div>
				<textarea class="form-control" style="height: 150px;" name='contact_us_address'><?=$contact_us_address?></textarea>
			</div>
		</div>
	</div>

	<div class='text-center'>
		<input type='hidden' name='formAction' value='updateContactUs'/>
		<?=$this->element("button", ['label'=>"Salvar"])?>
	</div>
</form>