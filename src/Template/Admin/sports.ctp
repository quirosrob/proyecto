<?php ?>
<div class='text-right'>
    <a href='/Admin/NewSport/'>
	<?=$this->element('buttonSm', ['label'=>"Nuevo Deporte"])?>
    </a>
</div>

<h3 class='text-center'>Deportes</h3>

<div class='itemList'>
    <?php
    foreach($sports as $sport){
		?>
		<div>
			<div class='itemListDetails'>
				<div class="info">
					<?php
					if(!empty($sport['image']['filename'])){
						$path="/img/uploads/{$sport['image']['filename']}";
						?>
						<div class='main_image' style='background-image: url("<?=$this->element('imageSrcItemList', ['path'=>$path])?>");' onclick="openImageZoom('<?=$path?>')"></div>
						<?php
					}
					else{
						?>
						<div class='main_image'></div>
						<?php
					}
					?>
					<div class='details'>
						<div class="name"><?=$sport['name']?></div>
						<div class="description"><?=$sport['description']?></div>
					</div>
				</div>
			</div>
			<div class="text-right">
				<form class='ajax' question="¿Eliminar Deporte?" style="display: inline-block">
					<input type="hidden" name='sport_id' value="<?=$sport['id']?>"/>
					<input type="hidden" name='formAction' value="deleteSport"/>
					<button type="submit" class="btn btn-xs btn-danger">Eliminar</button>
				</form>
				<a href="/Admin/Members/?sport_id=<?=$sport['id']?>">
					<?=$this->element('buttonXs', ['label'=>"Miembros"])?>
				</a>
				<a href="/Admin/Sport/<?=$sport['id']?>">
					<?=$this->element('buttonXs', ['label'=>"Editar"])?>
				</a>
			</div>
		</div>
		<?php
    }
    ?>
</div>