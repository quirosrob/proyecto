<?php ?>
<?php ?>
<div class="sectionInfo">
	
	<?php
	if(!empty($site_welcome_image)){
		?>
		<div class='welcomeImage'>
			<img src='<?=$this->element('imageSrc', ['path'=>UPLOADS_DIRECTORY_WEB."/{$site_welcome_image['filename']}"])?>' alt=''>
		</div>
		<?php
	}
	?>
	
	<div class='title text-center'>Bienvenido</div>
    <div class="text-center">
		<?=$site_welcome?>
    </div>
	
	<?php
	if(!empty($site_rules_file)){
		?>
		<br/>
		<br/>
		<h3 class='text-center'>Reglamento</h3>

		<div class='text-center'>
			<a href='<?=UPLOADS_DIRECTORY_WEB?>/<?=$site_rules_file?>' DOWNLOAD='<?=$site_rules_file_org_name?>'>
				<?=$this->element('button', ['label'=>"Descargar"])?>
			</a>
		</div>
		
		<?php
	}
	?>
	
	<br/>
	<br/>
	<h3 class='text-center'>Ubicación</h3>
	<?=$this->element('ubicationMap')?>
</div>
