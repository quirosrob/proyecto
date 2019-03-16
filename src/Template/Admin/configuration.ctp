<?php ?>
<h2 class='text-center'>Textos</h2>
<form class="ajax">
	<div class="formResponsive">
		<div>
			<div>Título</div>
			<div><input class='form-control' type='text' name='site_title' value='<?=$site_title?>'/></div>
		</div>
		<div>
			<div>Título abreviado</div>
			<div><input class='form-control' type='text' name='site_title_short' value='<?=$site_title_short?>'/></div>
		</div>
		<div>
			<div>Pie de página</div>
			<div>
				<textarea class="form-control" style="height: 150px;" name='site_footer'><?=$site_footer?></textarea>
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
				<input type='text' class='colorPicker' name='site_color_header_1' value='<?=$site_color_header_1?>' />
			</div>
		</div>

		<div>
			<div>Header 2</div>
			<div>
				<input type='text' class='colorPicker' name='site_color_header_2' value='<?=$site_color_header_2?>' />
			</div>
		</div>

		<div>
			<div>Textos</div>
			<div>
				<input type='text' class='colorPicker' name='site_color_text' value='<?=$site_color_text?>' />
			</div>
		</div>

		<div>
			<div>Fondo body</div>
			<div>
				<input type='text' class='colorPicker' name='site_color_body_background' value='<?=$site_color_body_background?>' />
			</div>
		</div>

		<div>
			<div>Borde body</div>
			<div>
				<input type='text' class='colorPicker' name='site_color_body_border' value='<?=$site_color_body_border?>' />
			</div>
		</div>

		<div>
			<div>Fondo footer</div>
			<div>
				<input type='text' class='colorPicker' name='site_color_footer_background' value='<?=$site_color_footer_background?>' />
			</div>
		</div>

		<div>
			<div>Borde footer</div>
			<div>
				<input type='text' class='colorPicker' name='site_color_footer_border' value='<?=$site_color_footer_border?>' />
			</div>
		</div>


		<div>
			<div>Fondo botón</div>
			<div>
				<input type='text' class='colorPicker' name='site_color_bottom_background' value='<?=$site_color_bottom_background?>' />
			</div>
		</div>

		<div>
			<div>Borde botón</div>
			<div>
				<input type='text' class='colorPicker' name='site_color_bottom_border' value='<?=$site_color_bottom_border?>' />
			</div>
		</div>

		<div>
			<div>Texto botón</div>
			<div>
				<input type='text' class='colorPicker' name='site_color_bottom_text' value='<?=$site_color_bottom_text?>' />
			</div>
		</div>

		<div>
			<div>Fondo botón activo</div>
			<div>
				<input type='text' class='colorPicker' name='site_color_bottom_background_active' value='<?=$site_color_bottom_background_active?>' />
			</div>
		</div>

		<div>
			<div>Borde botón activo</div>
			<div>
				<input type='text' class='colorPicker' name='site_color_bottom_border_active' value='<?=$site_color_bottom_border_active?>' />
			</div>
		</div>

		<div>
			<div>Texto botón activo</div>
			<div>
				<input type='text' class='colorPicker' name='site_color_bottom_text_active' value='<?=$site_color_bottom_text_active?>' />
			</div>
		</div>
	</div>

	<div class='text-center'>
		<input type='hidden' name='formAction' value='updateConfiguration'/>
		<?=$this->element('button', ['label'=>"Salvar"])?>
	</div>

</form>

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