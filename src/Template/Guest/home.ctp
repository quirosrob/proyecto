<?php ?>
<?php ?>
<div class="sectionInfo">
	<div class='title text-center'>Bienvenido</div>
    <div class="text-center">
		<?=$site_welcome?>
    </div>
	
	<?php
	if(!empty($site_rules_file)){
		?>
		<br/>
		<br/>
		<div class='title text-center'>Reglamento</div>

		<div class='text-center'>
			<a href='/img/uploads/<?=$site_rules_file?>' DOWNLOAD='<?=$site_rules_file_org_name?>'>
				<?=$this->element('button', ['label'=>"Descargar"])?>
			</a>
		</div>
		
		<?php
	}
	?>
	
	<br/>
	<br/>
	<div class='title text-center'>Ubicación</div>
	<?=$this->element('ubicationMap')?>
</div>
