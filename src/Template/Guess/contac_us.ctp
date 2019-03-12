<?php ?>
<h3 class="text-center">Contáctenos</h3>

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
			<textarea class="form-control" style="height: 150px;"></textarea>
		</div>
    </div>
</div>

<div class='text-center'>
	<?=$this->element("button", ['label'=>"Enviar"])?>
</div>


<h3 class="text-center">Nuestros datos</h3>
<div class="formResponsive">
    <div>
		<div>Correo</div>
		<div>info@salfadeco.com</div>
    </div>
    <div>
		<div>Teléfono</div>
		<div>22554455</div>
    </div>
    <div>
		<div>Dirección</div>
		<div>
			San Jose. Mata Redonda. Sabana este, Lorem ipsum dolor sit amet, 
			consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore 
			et dolore magna aliqua. 
		</div>
    </div>
</div>