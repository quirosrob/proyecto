<?php ?>
<h3 class='text-center'>Nuevo Usuario</h3>

<form class='ajax'>
	<div class="formResponsive">
		<div>
			<div>Nombre</div>
			<div><input class='form-control' type='text' name='name' value=''/></div>
		</div>
		<div>
			<div>Usuario</div>
			<div><input class='form-control' type='text' name='username' value=''/></div>
		</div>
		<div>
			<div>Puesto</div>
			<div><input class='form-control' type='text' name='job' value=''/></div>
		</div>
		<div>
			<div>Contraseña</div>
			<div>
				<input class='form-control' type='password' name='password' value=''/>
			</div>
		</div>
	</div>
	
	<?php
	if($addUserResult!==null && !$addUserResult['status']){
		?>
		<div class="alert alert-danger text-center">
			<div><strong>¡Error!</strong></div>
			<?php
			if($addUserResult['error']=='duplicated username'){
				?>
				Usuario duplicado
				<?php
			}
			?>
		</div>
		<?php
	}
	?>
	
	
	<div class='text-center'>
		<input type='hidden' name='formAction' value='addUser'/>
		<?=$this->element('button', ['label'=>"Salvar"])?>
	</div>
</form>

<h3 class='text-center'>Usuarios</h3>

<div class='itemList'>
	 <?php
    foreach($users as $user){
		?>
		<div>
			<div class='itemListDetails'>
				<div class="info">
					<div class='main_image' style='background-image: url("<?=$this->element('imageSrcItemList', ['path'=>"/img/anonymous.png"])?>");' onclick="openImageZoom('/img/anonymous.png')"></div>
					<div class='details'>
						<div class="name"><?=$user['name']?></div>
						<div class="job"><?=$user['job']?></div>
					</div>
				</div>
			</div>
			<div class="text-right">
				<?php
				if($user['role']!='ADMIN'){
					?>
					<form class='ajax' question="¿Eliminar Usuario?" style="display: inline-block">
						<input type="hidden" name='user_id' value="<?=$user['id']?>"/>
						<input type="hidden" name='formAction' value="deleteUser"/>
						<button type="submit" class="btn btn-xs btn-danger">Eliminar</button>
					</form>
					<?php
				}
				?>
				<a href="/Admin/UserEdit/<?=$user['id']?>">
					<?=$this->element('buttonXs', ['label'=>"Editar"])?>
				</a>
			</div>
		</div>
		<?php
    }
    ?>
</div>