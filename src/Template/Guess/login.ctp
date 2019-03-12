<?php ?>
<div class="formResponsive">
    <div>
		<div>Usuario</div>
		<div><input class='form-control' type='text' name='name' value=''/></div>
    </div>
    <div>
		<div>Contraseña</div>
		<div><input class='form-control' type='password' name='name' value=''/></div>
    </div>
</div>

<div class='text-center'>
    <a href='/Admin'>
		<?=$this->element('button', ['label'=>"Ingresar"])?>
    </a>
</div>