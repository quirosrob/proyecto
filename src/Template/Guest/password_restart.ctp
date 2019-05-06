<?php 
if($updateDone){
	?>
	<div class="alert alert-success text-center">
		Contraseña actualizada
	</div>
	<?php
}
else{
	if(!empty($user)){
		?>
		<form class='ajax'>
			<div class="formResponsive">
				<div>
					<div>Nombre</div>
					<div><?=$user['name']?></div>
				</div>
				<div>
					<div>Username</div>
					<div><?=$user['username']?></div>
				</div>
				<div>
					<div>Nuevo Password</div>
					<div><input class='form-control' type='password' name='password' value=''/></div>
				</div>
			</div>

			<div class='text-center'>
				<input type='hidden' name='formAction' value='passwordRestart'/>
				<?=$this->element('button', ['label'=>"Salvar"])?>
			</div>
		</form>
		<?php
	}
	else{
		?>
		<div class="alert alert-danger text-center">
			El link ya esta expirado
		</div>
		<?php
	}
}