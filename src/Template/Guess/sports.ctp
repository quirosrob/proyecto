<?php ?>
<h3 class='text-center'>
    Deportes
</h3>

<div class='itemList'>
    <?php
    for($i=0; $i<5; $i++){
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
				<a href="/Guess/Members/?sport_id=1">
					<?=$this->element('buttonXs', ['label'=>"Miembros"])?>
				</a>
				<a href="/Guess/Sport/1">
					<?=$this->element('buttonXs', ['label'=>"Detalles"])?>
				</a>
			</div>
		</div>
	
		<div>
			<div class='itemListDetails'>
				<div class="info">
					<div class='main_image' style='background-image: url("<?=$this->element('imageSrcItemList', ['path'=>"/img/sports/soccer.png"])?>");' onclick="openImageZoom('/img/sports/soccer.png')"></div>
					<div class='details'>
						<div class="name">Fútbol</div>
					</div>
				</div>
			</div>
			<div class="text-right">
				<a href="/Guess/Members/?sport_id=1">
					<?=$this->element('buttonXs', ['label'=>"Miembros"])?>
				</a>
				<a href="/Guess/Sport/1">
					<?=$this->element('buttonXs', ['label'=>"Detalles"])?>
				</a>
			</div>
		</div>
	
		<div>
			<div class='itemListDetails'>
				<div class="info">
					<div class='main_image' style='background-image: url("<?=$this->element('imageSrcItemList', ['path'=>"/img/sports/tennis.png"])?>");' onclick="openImageZoom('/img/sports/tennis.png')"></div>
					<div class='details'>
						<div class="name">Tenis</div>
					</div>
				</div>
			</div>
			<div class="text-right">
				<a href="/Guess/Members/?sport_id=1">
					<?=$this->element('buttonXs', ['label'=>"Miembros"])?>
				</a>
				<a href="/Guess/Sport/1">
					<?=$this->element('buttonXs', ['label'=>"Detalles"])?>
				</a>
			</div>
		</div>
		<?php
    }
    ?>
</div>