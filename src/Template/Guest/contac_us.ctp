<?php ?>
<h3 class="text-center">Contáctenos</h3>

<form class='ajax'>
	<div class="formResponsive">
		<div>
			<div>Nombre</div>
			<div><input class='form-control' type='text' name='name' value=''/></div>
		</div>
		<div>
			<div>Correo</div>
			<div><input class='form-control' type='text' name='email' value=''/></div>
		</div>

		<div>
			<div>Teléfono</div>
			<div><input class='form-control' type='tel' name='phone' value=''/></div>
		</div>
		<div>
			<div>Comentario</div>
			<div>
				<textarea class="form-control" name='comment' style="height: 150px;"></textarea>
			</div>
		</div>
	</div>

	<div class='text-center'>
		<?=$this->element("button", ['label'=>"Enviar"])?>
		<input type='hidden' name='formAction' value='sendContactMail'/>
	</div>
</form>

<h3 class="text-center">Nuestros datos</h3>
<div class="formResponsive">
    <div>
		<div>Correo</div>
		<div><?=$contact_us_email?></div>
    </div>
    <div>
		<div>Teléfono</div>
		<div><?=$contact_us_phone?></div>
    </div>
    <div>
		<div>Dirección</div>
		<div><?=$contact_us_address?></div>
    </div>
</div>

<?=$this->element('ubicationMap')?>