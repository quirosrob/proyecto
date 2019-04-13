<?php ?>
<h3 class='text-center'>Nuevo Miembro</h3>

<form class='ajax'>
	<div class="formResponsive">
		<div>
			<div>Nombre</div>
			<div><input class='form-control' type='text' name='name' value=''/></div>
		</div>
		<div>
			<div>Fecha ingreso</div>
			<div>
				<?=$this->element('inputDate', ['name'=>'date_entry', 'value'=>date("Y-m-d")])?>
			</div>
		</div>
		<div>
			<div>Año de nacimiento</div>
			<div>
				<input class='form-control' type='text' name='year_birth' value=''/>
			</div>
		</div>
		<div>
			<div>Año de defunción</div>
			<div>
				<input class='form-control' type='text' name='year_death' value=''/>
			</div>
		</div>
		<div>
			<div>Número</div>
			<div>
				<input class='form-control' type='text' name='number' value=''/>
			</div>
		</div>
		<div>
			<div>Imagen</div>
			<div>
				<input type='file' name='image' value=''/>
			</div>
		</div>
		<div>
			<div>Deporte</div>
			<div>
				<?php
				foreach($sports as $sport){
					?>
					<div>
						<label>
							<input type='checkbox' name='sport_<?=$sport['id']?>' value='Y' />
							<?=$sport['name']?>
						</label>
					</div>
					<?php
				}
				?>
			</div>
		</div>
	</div>

	<textarea name='biography' class='richTextArea'></textarea>

	<br/>
	<div class='text-center'>
		<input type='hidden' name='formAction' value='addMember'/>
		<?=$this->element('button', ['label'=>"Salvar"])?>
	</div>
</form>

<script>
	makeRichtTextAreas();
</script>