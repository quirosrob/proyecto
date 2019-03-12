<?php ?>
<div class='text-right'>
    <a href='/Admin/NewSport/'>
	<?=$this->element('buttonSm', ['label'=>"Nuevo Deporte"])?>
    </a>
</div>

<h3 class='text-center'>Deportes</h3>

<div class='itemList'>
    <?php
    for($i=0; $i<10; $i++){
		?>
		<div>
			<div class='itemListDetails'>
				<div class="info">
					<div class='main_image' style='background-image: url("<?=$this->element('imageSrcItemList', ['path'=>"/img/sports/basketball.png"])?>");' onclick="openImageZoom('/img/sports/basketball.png')"></div>
					<div class='details'>
						<div class="name">Baloncesto</div>
					</div>
				</div>
			</div>
			<div class="text-right">
				<a href="?delete_id=<?=$i?>">
					<button type="button" class="btn btn-xs btn-danger">Eliminar</button>
				</a>
				<a href="/Admin/Members/?sport_id=1">
					<?=$this->element('buttonXs', ['label'=>"Miembros"])?>
				</a>
				<a href="/Admin/Sport/1">
					<?=$this->element('buttonXs', ['label'=>"Editar"])?>
				</a>
			</div>
		</div>
		<?php
    }
    ?>
</div>