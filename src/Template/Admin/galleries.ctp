<?php ?>
<div class='text-right'>
    <a href='/Admin/NewGalery/'>
		<?=$this->element('buttonSm', ['label'=>"Nueva Galería"])?>
    </a>
</div>

<h3 class='text-center'>
    Galerías
</h3>

<div class='itemList'>
    <?php
    for($i=0; $i<10; $i++){
		?>
		<div>
			<div class='itemListDetails'>
				<div class="info">
					<div class='main_image' style='background-image: url("<?=$this->element('imageSrcItemList', ['path'=>"/img/galleries/trofeo.jpg"])?>");' onclick="openImageZoom('/img/galleries/trofeo.jpg')"></div>
					<div class='details'>
						<div class="name">Trofeos 2018</div>
						<div class="description">
							<p>
								Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
							</p>
						</div>
					</div>
				</div>
			</div>
			<div class="text-right">
				<a href="?delete_id=<?=$i?>">
					<button type="button" class="btn btn-xs btn-danger">Eliminar</button>
				</a>
				<a href="/Admin/Gallery/1">
					<?=$this->element('buttonXs', ['label'=>"Editar"])?>
				</a>
			</div>
		</div>
		<?php
    }
    ?>
</div>