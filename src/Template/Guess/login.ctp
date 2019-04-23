<?php
if(empty($authUser)){
	?>
	<form class='ajax'>
		<div class="formResponsive">
			<div>
				<div>Usuario</div>
				<div><input class='form-control' type='text' name='username' value='<?=$username?>'/></div>
			</div>
			<div>
				<div>Contraseña</div>
				<div><input class='form-control' type='password' name='password' value=''/></div>
			</div>
		</div>

		<div class='text-center'>
			<input type='hidden' name='formAction' value='login'/>
			<?=$this->element('button', ['label'=>"Ingresar"])?>
		</div>
	</form>
	<?php
}
else{
	?>
	<script>
		location.href='/Admin/'
	</script>
	<?php
}