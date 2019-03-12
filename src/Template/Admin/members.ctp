<?php ?>
<div class='text-right'>
    <a href='/Admin/NewMember/'>
		<?=$this->element('buttonSm', ['label'=>"Nuevo Miembro"])?>
    </a>
</div>

<h3 class='text-center'>Miembros</h3>

<div class="formResponsive">
    <div>
		<div>Nombre</div>
		<div><input class='form-control' type='text' name='filter' value=''/></div>
    </div>
	<div>
		<div>Deporte</div>
		<div>
			<select name='sport' class='form-control'>
				<option value=''></option>
				<option value='1'>Tenis</option>
				<option value='1'>Ciclismo</option>
				<option value='1'>Natacion</option>
				<option value='1'>Atletismo</option>
				<option value='1'>Boxeo</option>
			</select>
		</div>
    </div>
</div>

<div class='text-center'>
    <?=$this->element('buttonSm', ['label'=>"Filtrar"])?>
</div>

<div class='itemList'>
    <?php
    for($i=0; $i<10; $i++){
		?>
		<div>
			<div class='itemListDetails'>
				<div class="info">
					<div class='main_image' style='background-image: url("<?=$this->element('imageSrcItemList', ['path'=>"/img/members/094.jpg"])?>");' onclick="openImageZoom('/img/members/094.jpg')"></div>
					<div class='details'>
						<div class="name">Osvaldo Pandolfo Rímolo</div>
						<div class="sports">Baloncesto</div>
						<div class="year">1977</div>
					</div>
				</div>
			</div>
			<div class="text-right">
				<a href="?delete_id=<?=$i?>">
					<button type="button" class="btn btn-xs btn-danger">Eliminar</button>
				</a>
				<a href="/Admin/Member/1">
				<?=$this->element('buttonXs', ['label'=>"Editar"])?>
				</a>
			</div>
		</div>
		<?php
    }
    ?>
</div>