<?php ?>
<h3 class="text-center">Contáctenos</h3>

<div class="formResponsive">
    <div>
		<div>Correo</div>
		<div><input class='form-control' type='text' name='email' value='info@salfadeco.com'/></div>
    </div>
	
    <div>
		<div>Teléfono</div>
		<div><input class='form-control' type='tel' name='phone' value='22554455'/></div>
    </div>
    <div>
		<div>Dirección</div>
		<div>
			<textarea class="form-control" style="height: 150px;">San Jose. Mata Redonda. Sabana este, Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</textarea>
		</div>
    </div>
</div>

<div class='text-center'>
	<?=$this->element("button", ['label'=>"Salvar"])?>
</div>