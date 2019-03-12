<?php ?>
<h3 class='text-center'>Cambiar mi Contraseña</h3>

<div class="formResponsive">
    <div>
		<div>Vieja contraseña</div>
		<div><input class='form-control' type='password' name='name' value=''/></div>
    </div>
	<div>
		<div>Nueva contraseña</div>
		<div><input class='form-control' type='password' name='name' value=''/></div>
    </div>
	 <div>
		<div>Redigite</div>
		<div><input class='form-control' type='password' name='name' value=''/></div>
    </div>
</div>

<div class='text-center'>
    <?=$this->element('button', ['label'=>"Cambiar Contraseña"])?>
</div>

<h3 class='text-center'>Usuarios</h3>

<div class='itemList'>
	 <?php
    for($i=0; $i<10; $i++){
		?>
		<div>
			<div class='itemListDetails'>
				<div class="info">
					<div class='main_image' style='background-image: url("<?=$this->element('imageSrcItemList', ['path'=>"/img/anonymous.png"])?>");' onclick="openImageZoom('/img/anonymous.png')"></div>
					<div class='details'>
						<div class="name">Marty Mcfly</div>
						<div class="job">Asistente</div>
						<div class="rights"></div>
					</div>
				</div>
			</div>
			<div class="text-right">
				<a href="?delete_id=<?=$i?>">
					<button type="button" class="btn btn-xs btn-danger">Eliminar</button>
				</a>
				<a href="/Admin/UsersRights/<?=$i?>">
					<?=$this->element('buttonXs', ['label'=>"Editar"])?>
				</a>
			</div>
		</div>
		<?php
    }
    ?>
</div>