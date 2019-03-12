<?php ?>
<div class="text-right">
    <a href='/Admin/MemberGalery/1'>
		<?=$this->element('buttonXs', ['label'=>'Galería'])?>
    </a>
</div>

<div class="sectionInfo">
	<div class='main_image' style='background-image: url("<?=$this->element('imageSrcItemList', ['path'=>"/img/members/094.jpg"])?>");' onclick="openImageZoom('/img/members/094.jpg')"></div>

	<div class="formResponsive">
		<div>
			<div>Nombre</div>
			<div><input class='form-control' type='text' name='name' value='Osvaldo Pandolfo Rímolo'/></div>
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

	<textarea name='detail' class='richTextArea'>
		<p>
		Nació en San José el día 22 de agosto de 1949. Desde muy jóven, en 1964 y como alumno del Colegio Los Angeles se dedicó a la práctica del baloncesto, integrando el equipo estudiantíl primero en segunda división y ascendiendo a la primera categoría en 1966, ganando el Campeonato de Copa. Por espacio de ocho años consecutivos, entre 1967 y 1975 juega con la Universidad de Costa Rica, obteniendo 4 Campeonatos Nacionales, 2 Subcampeonatos, 3 Campeonatos de Copa y 1 Subcampeonato Centroamericano. Cambiando de equipo, juega con el Liceo de Costa Rica y Reyco entre los años 1976 y 1980. 
		</p>
		<p>
		Entre 1970 y 1977 forma parte de la Selección Nacional de Baloncesto, ocupando el puesto de Capitán del equipo, al igual que le ocurría en su participación con los equipos de Primera División; distinguiéndose siempre por su juego limpio y disciplinado, lo que le valió el reconocimiento del Círculo de Periodistas y Locutores Deportivos de Costa Rica en 1977.
		</p>
		<p>
		Luego de su retiro en 1980, alterna su actividad deportiva como jugador de maxibaloncesto, teniendo grandes éxitos a nivel internacional con la Universidad Nacional y la Selección Nacional; con cargos de directivo, labores de entrenador y la práctica profesional como Ingeniero Agrónomo graduado en la Universidad de Costa Rica, llegando a ocupar el Viceministerio de Agricultura y Ganadería entre 1986 a 1990.
		</p>
	</textarea>
	<br/>
	<div class='text-center'>
		<?=$this->element('button', ['label'=>"Salvar"])?>
	</div>
</div>

<script>
	makeRichtTextAreas();
</script>