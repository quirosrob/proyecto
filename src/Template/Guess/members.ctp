<?php ?>
<h3 class='text-center'>
    Miembros
</h3>

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
				<option value='1' <?=$sport_id==1? "selected" : ""?> >Baloncesto</option>
				<option value='2'>Ciclismo</option>
				<option value='3'>Natacion</option>
				<option value='4'>Atletismo</option>
				<option value='5'>Boxeo</option>
			</select>
		</div>
    </div>
</div>

<div class='text-center'>
    <?=$this->element('button', ['label'=>"Filtrar"])?>
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
				<a href="/Guess/Member/1">
					<?=$this->element('buttonXs', ['label'=>"Detalles"])?>
				</a>
			</div>
		</div>
		<?php
    }
    ?>
</div>