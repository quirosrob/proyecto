<?php ?>
<h3 class='text-center'>Marty Mcfly</h3>

<div class="formResponsive">
	<div>
		<div>Nombre</div>
		<div>
			<input type='text' name='name' value='Marty Mcfly' class='form-control'/>
		</div>
    </div>
	<div>
		<div>Cargo</div>
		<div>
			<input type='text' name='name' value='Asistente' class='form-control'/>
		</div>
    </div>
    <div>
		<div>Permisos</div>
		<div>
			<div>
				<label>
					<input type='checkbox' name='permit' value='Y'/>
					Noticias
				</label>
			</div>
			<div>
				<label>
					<input type='checkbox' name='permit' value='Y'/>
					Miembros
				</label>
			</div>
			<div>
				<label>
					<input type='checkbox' name='permit' value='Y'/>
					Deportes
				</label>
			</div>
			<div>
				<label>
					<input type='checkbox' name='permit' value='Y'/>
					Juntas Directivas
				</label>
			</div>
			<div>
				<label>
					<input type='checkbox' name='permit' value='Y'/>
					Contáctenos
				</label>
			</div>
			<div>
				<label>
					<input type='checkbox' name='permit' value='Y'/>
					Galerías
				</label>
			</div>
			<div>
				<label>
					<input type='checkbox' name='permit' value='Y'/>
					Historia
				</label>
			</div>
			<div>
				<label>
					<input type='checkbox' name='permit' value='Y'/>
					Configuración
				</label>
			</div>
			<div>
				<label>
					<input type='checkbox' name='permit' value='Y'/>
					Accesos
				</label>
			</div>
		</div>
    </div>
</div>

<div class='text-center'>
    <?=$this->element('button', ['label'=>"Salvar"])?>
</div>