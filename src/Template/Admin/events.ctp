<?php ?>
<div class='text-right'>
    <a href='/Admin/NewEvent/'>
		<?=$this->element('buttonSm', ['label'=>"Nueva Noticia"])?>
    </a>
</div>

<h3 class='text-center'>Noticias</h3>

<div class='itemList'>
    <?php
	foreach($events as $event){
		?>
		<div>
			<div class='itemListDetails'>
				<div class="info">
					<?php
					if(!empty($event['image']['filename'])){
						$path="/img/uploads/{$event['image']['filename']}";
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
						<div class="name"><?=$event['name']?></div>
						<div class="date"><?=$event['date']?></div>
						<div class="description"><?=$event['description']?></div>
					</div>
				</div>
			</div>
			<div class="text-right">
				<a href="?formAction=deleteEvent&event_id=<?=$event['id']?>">
					<button type="button" class="btn btn-xs btn-danger">Eliminar</button>
				</a>
				<a href="/Admin/Event/<?=$event['id']?>">
					<?=$this->element('buttonXs', ['label'=>"Editar"])?>
				</a>
			</div>
		</div>
		<?php
    }
    ?>
</div>