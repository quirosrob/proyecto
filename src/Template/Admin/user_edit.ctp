<?php ?>
<h3 class='text-center'><?=$user['name']?></h3>

<form class='ajax'>
	<div class="formResponsive">
		<div>
			<div>Nombre</div>
			<div>
				<input type='text' name='name' value='<?=$user['name']?>' class='form-control'/>
			</div>
		</div>
		<div>
			<div>Usuario</div>
			<div>
				<input type='text' name='username' value='<?=$user['username']?>' class='form-control'/>
			</div>
		</div>
		<div>
			<div>Puesto</div>
			<div>
				<input type='text' name='job' value='<?=$user['job']?>' class='form-control'/>
			</div>
		</div>
		<div>
			<div>Contraseña</div>
			<div>
				<input type='password' name='password' value='' autocomplete="off" class='form-control' id='password_user'/>
			</div>
		</div>
		<div>
			<div>Permisos</div>
			<div>
				<?php
				foreach($permitions as $permition){
					?>
					<div>
						<label>
							<input type='checkbox' name='permition_<?=$permition['id']?>' value='Y' <?=isset($userPermitions[$permition['id']])? "checked='true'":""?> />
							<?=$permition['name']?>
						</label>
					</div>
					<?php
				}
				?>
			</div>
		</div>
	</div>

	<div class='text-center'>
		<input type='hidden' name='formAction' value='updateUser'/>
		<?=$this->element('button', ['label'=>"Salvar"])?>
	</div>
</form>

<script>
	setTimeout(function(){
		$("#password_user").val("");
	}, 500);
</script>