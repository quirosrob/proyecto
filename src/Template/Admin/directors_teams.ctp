<?php ?>
<div class='text-right'>
    <a href='/Admin/NewDirectorsTeam/'>
		<?=$this->element('buttonSm', ['label'=>"Nueva Junta"])?>
    </a>
</div>

<h3 class='text-center'>Juntas Directivas</h3>

<div class='itemList'>
    <?php
    for($i=0; $i<10; $i++){
		?>
		<div>
			<div class='itemListDetails'>
				<div class="info">
					<div class='main_image' style='background-image: url("<?=$this->element('imageSrcItemList', ['path'=>"/img/directors/junta-08-09.jpg"])?>");' onclick="openImageZoom('/img/directors/junta-08-09.jpg')"></div>
					<div class='details'>
						<div class="name">Junta Directiva 2008-2009</div>
						<div class="members">
							<div>PRESIDENTE: CARLOS CORTES PACHECO</div>		
							<div>VICEPRESIDENTE: WALTER ELIZONDO GOMEZ</div>
							<div>SECRETARIA: MARGARITA SEGREDA VIQUEZ</div>
							<div>FISCAL: HUGO CHAMBERLAIN TREJOS</div>
							<div>TESORERO: RENATO SOTO PACHECO</div>
							<div>VOCAL I: EDGAR MARIN LEVI</div>
							<div>VOCAL II: JUAN SOTO PARIS</div>
							<div>VOCAL III: RODRIGO CALVO CHACON</div>
						</div>
					</div>
				</div>
			</div>
			<div class="text-right">
				<a href="?delete_id=<?=$i?>">
					<button type="button" class="btn btn-xs btn-danger">Eliminar</button>
				</a>
				<a href="/Admin/DirectorsTeam/1">
					<?=$this->element('buttonXs', ['label'=>"Editar"])?>
				</a>
			</div>
		</div>
		<?php
    }
    ?>
</div>