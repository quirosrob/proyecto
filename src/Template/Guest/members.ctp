<?php ?>
<h3 class='text-center'>
    Miembros
</h3>

<form class='ajax'>
	<div class="formResponsive">
		<div>
			<div>Nombre</div>
			<div><input class='form-control' type='text' name='filter' value='<?=$filter?>'/></div>
		</div>
		<div>
			<div>Deporte</div>
			<div>
				<select name='sport_id' class='form-control'>
					<option value=''></option>
					<?php
					foreach($sports as $sport){
						?>
						<option value='<?=$sport['id']?>' <?=$sport['id']==$sport_id? "selected":""?>>
							<?=$sport['name']?>
						</option>
						<?php
					}
					?>
				</select>
			</div>
		</div>
	</div>

	<div class='text-center'>
		<?=$this->element('button', ['label'=>"Filtrar"])?>
	</div>
</form>

<?=$this->element('pagination')?>

<div class='itemList'>
    <?php
    foreach($members as $member){
		?>
		<div>
			<div class='itemListDetails'>
				<div class="info">
					<?php
					if(!empty($member['image']['filename'])){
						$path=UPLOADS_DIRECTORY_WEB."/{$member['image']['filename']}";
						?>
						<div class='main_image' style='background-image: url("<?=$this->element('imageSrcItemList', ['path'=>$path])?>");' onclick="openImageZoom('<?=$path?>')"></div>
						<?php
					}
					else{
						?>
						<div class='main_image'></div>
						<?php
					}
					?>
					<div class='details'>
						<div class="name"><?=$member['name']?></div>
						<div class="sports">
							<?php
							foreach($member['sports'] as $sport){
								if(!empty($sport['image']['filename'])){
									$path=UPLOADS_DIRECTORY_WEB."/{$sport['image']['filename']}";
									?>
									<div class='sportIcon' style='background-image: url("<?=$this->element('imageSrc', ['path'=>$path, 'w'=>30, 'h'=>30])?>");'></div>
									<?php
								}
								?>
								<?=$sport['name']?>
								<?php
							}
							?>
						</div>
						<div class="year"><?=!empty($member['date_entry'])? date("Y", strtotime($member['date_entry'])) : ""?></div>
						<div class="description"><?=$member['biography']?></div>
					</div>
				</div>
			</div>
			<div class="text-right">
				<a href="/Guest/Member/<?=$member['id']?>">
				<?=$this->element('buttonXs', ['label'=>"Detalles"])?>
				</a>
			</div>
		</div>
		<?php
    }
    ?>
</div>