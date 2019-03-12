<?php ?>
<h3 class='text-center'>Nuevo Miembro</h3>

<div class="formResponsive">
    <div>
		<div>Nombre</div>
		<div><input class='form-control' type='text' name='name' value=''/></div>
    </div>
    <div>
		<div>Año ingreso</div>
		<div><input class='form-control' type='text' name='name' value=''/></div>
    </div>
    <div>
		<div>Imagen</div>
		<div>

			<input type='file' name='image_id' value=''/>
		</div>
    </div>
    <div>
		<div>Deporte</div>
		<div>
			<div>
				<label>
					<input type='checkbox' value='sport_1' value='Y' />
					Tenis
				</label>
			</div>
			<div>
				<label>
					<input type='checkbox' value='sport_1' value='Y' />
					Ciclismo
				</label>
			</div>
			<div>
				<label>
					<input type='checkbox' value='sport_1' value='Y' />
					Tenis
				</label>
			</div>
			<div>
				<label>
					<input type='checkbox' value='sport_1' value='Y' />
					Natacion
				</label>
			</div>
			<div>
				<label>
					<input type='checkbox' value='sport_1' value='Y' />
					Atletismo
				</label>
			</div>
			<div>
				<label>
					<input type='checkbox' value='sport_1' value='Y' />
					Boxeo
				</label>
			</div>
		</div>
    </div>
</div>

<textarea name='detail' class='richTextArea'></textarea>

<br/>
<div class='text-center'>
    <?=$this->element('button', ['label'=>"Salvar"])?>
</div>

<script>
	makeRichtTextAreas();
</script>