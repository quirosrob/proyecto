<?php ?>
<div class='text-right'>
    <a href='/Admin/NewDirectorsTeam/'>
		<?=$this->element('buttonSm', ['label'=>"Nueva Junta"])?>
    </a>
</div>

<h3 class='text-center'>Juntas Directivas</h3>

<?=$this->element('pagination')?>

<div class='itemList'>
    <?php
    foreach($directors_teams as $directors_team){
		?>
		<div>
			<div class='itemListDetails'>
				<div class="info">
					<?php
					if(!empty($directors_team['image']['filename'])){
						$path="/img/uploads/{$directors_team['image']['filename']}";
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
						<div class="name"><?=$directors_team['name']?></div>
						<div class="description"><?=$directors_team['description']?></div>
					</div>
				</div>
			</div>
			<div class="text-right">
				<form class='ajax' question="¿Eliminar Evento?" style="display: inline-block">
					<input type="hidden" name='directors_team_id' value="<?=$directors_team['id']?>"/>
					<input type="hidden" name='formAction' value="deleteDirectorsTeam"/>
					<button type="submit" class="btn btn-xs btn-danger">Eliminar</button>
				</form>
				<a href="/Admin/DirectorsTeam/<?=$directors_team['id']?>">
					<?=$this->element('buttonXs', ['label'=>"Editar"])?>
				</a>
			</div>
		</div>
		<?php
    }
    ?>
</div>