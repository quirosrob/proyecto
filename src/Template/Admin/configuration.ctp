<?php ?>
<h2 class='text-center'>Textos</h2>

<div class="formResponsive">
    <div>
		<div>Título</div>
		<div><input class='form-control' type='text' name='name' value='Salón de la Fama del deporte Costarricense'/></div>
    </div>
    <div>
		<div>Pie de página</div>
		<div>
			<textarea class="form-control" style="height: 150px;">En el año 1960 se crea la Galeria del Deporte Costarricese, como una forma de perpetuar en la memoria de todos los tiempos, maximos exponente de la mayoria de diciplinas deportivas que se practican en el país.</textarea>
		</div>
    </div>
</div>

<h2 class='text-center'>Imagenes</h2>

<div class="formResponsive">
	<div>
		<div>Logo</div>
		<div>
			<input type='file' name='logo' />
		</div>
    </div>
</div>

<h2 class='text-center'>Colores</h2>

<div class="formResponsive">
	<div>
		<div>Header 1</div>
		<div>
			<input type='text' class='colorPicker' name='color' value='A9A768' />
		</div>
    </div>
	
	<div>
		<div>Header 2</div>
		<div>
			<input type='text' class='colorPicker' name='color' value='DEDDAA' />
		</div>
    </div>
	
	<div>
		<div>Textos</div>
		<div>
			<input type='text' class='colorPicker' name='color' value='555413' />
		</div>
    </div>
	
	<div>
		<div>Fondo body</div>
		<div>
			<input type='text' class='colorPicker' name='color' value='F0EFCA' />
		</div>
    </div>
	
	<div>
		<div>Borde body</div>
		<div>
			<input type='text' class='colorPicker' name='color' value='9F9D4F' />
		</div>
    </div>
	
	<div>
		<div>Fondo footer</div>
		<div>
			<input type='text' class='colorPicker' name='color' value='DEDDAA' />
		</div>
    </div>
	
	<div>
		<div>Borde footer</div>
		<div>
			<input type='text' class='colorPicker' name='color' value='9F9D4F' />
		</div>
    </div>
	
	
	<div>
		<div>Fondo botón</div>
		<div>
			<input type='text' class='colorPicker' name='color' value='85843B' />
		</div>
    </div>
	
	<div>
		<div>Borde botón</div>
		<div>
			<input type='text' class='colorPicker' name='color' value='85843B' />
		</div>
    </div>
	
	<div>
		<div>Texto botón</div>
		<div>
			<input type='text' class='colorPicker' name='color' value='555416' />
		</div>
    </div>
	
	<div>
		<div>Fondo botón activo</div>
		<div>
			<input type='text' class='colorPicker' name='color' value='85843B' />
		</div>
    </div>
	
	<div>
		<div>Borde botón activo</div>
		<div>
			<input type='text' class='colorPicker' name='color' value='85843B' />
		</div>
    </div>
	
	<div>
		<div>Texto botón activo</div>
		<div>
			<input type='text' class='colorPicker' name='color' value='DEDDAA' />
		</div>
    </div>
</div>

<div class='text-center'>
    <?=$this->element('button', ['label'=>"Salvar"])?>
</div>

<script>
	$('.colorPicker').spectrum({
		preferredFormat: "hex",
		flat: false,
		showInput: false,
		allowEmpty:true,
		showSelectionPalette: true,
		cancelText: "Cancelar",
		chooseText: "Ok"
	});
</script>