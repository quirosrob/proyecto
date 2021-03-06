<?php ?>
<div class="text-right">
    <a href='/Admin/MemberGalery/<?=$member['id']?>'>
		<?=$this->element('buttonXs', ['label'=>'Galería'])?>
    </a>
</div>
<form class='ajax'>
	<div class="sectionInfo">
		<?php
		if(!empty($member['image']['filename'])){
			$path=UPLOADS_DIRECTORY_WEB."/{$member['image']['filename']}";
			?>
			<div class='main_image' style='background-image: url("<?=$this->element('imageSrcItemList', ['path'=>$path])?>");' onclick="openImageZoom('<?=$path?>')"></div>
			<?php
		}
		?>

		<div class="formResponsive">
			<div>
				<div>Nombre</div>
				<div><input class='form-control' type='text' name='name' value='<?=$member['name']?>'/></div>
			</div>
			<div>
				<div>Fecha ingreso</div>
				<div>
					<?=$this->element('inputDate', ['name'=>'date_entry', 'value'=>$member['date_entry']])?>
				</div>
			</div>
			<div>
				<div>Año de nacimiento</div>
				<div>
					<input class='form-control' type='text' name='year_birth' value='<?=$member['year_birth']?>'/>
				</div>
			</div>
			<div>
				<div>Año de defunción</div>
				<div>
					<input class='form-control' type='text' name='year_death' value='<?=$member['year_death']?>'/>
				</div>
			</div>
			<div>
				<div>Número</div>
				<div>
					<input class='form-control' type='text' name='number' value='<?=$member['number']?>'/>
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
					<div class="sportCheckboxesWrap">
						<?php
						foreach($sports as $sport){
							?>
							<div>
								<label>
									<input type='checkbox' name='sport_<?=$sport['id']?>' value='Y' <?=isset($member['sports'][$sport['id']])? "checked='true'":""?> />
									<?=$sport['name']?>
								</label>
							</div>
							<?php
						}
						?>
					</div>
				</div>
			</div>
		</div>

		<textarea name='biography' class='richTextArea'><?=$member['biography']?></textarea>
		<br/>
		
		<div class='main_image' style='background-image: url("/img/qr/member_<?=$member['id']?>.png");'></div>
		
		<br/>
		
		<div class='text-center'>
			<input type='hidden' name='formAction' value='updateMember'/>
			<?=$this->element('button', ['label'=>"Salvar"])?>
		</div>
	</div>
</form>

<script>
	makeRichtTextAreas();
</script>

<?php
foreach($member['sports'] as $sport){
	?>
	<?=$this->element('styleSportColor', ['color'=>$sport['color']])?>
	<?php
	break;
}
?>