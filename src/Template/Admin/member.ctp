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
			$path="/img/uploads/{$member['image']['filename']}";
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

		<textarea name='biography' class='richTextArea'><?=$member['biography']?></textarea>
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