<?php ?>
<h3 class='text-center'>Juntas Directivas</h3>

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
				<a href="/Guess/DirectorsTeam/<?=$directors_team['id']?>">
					<?=$this->element('buttonXs', ['label'=>"Detalles"])?>
				</a>
			</div>
		</div>
		<?php
    }
    ?>
</div>