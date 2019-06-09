<?php ?>
<h2 class='text-center'>Generar Backup</h2>
<div class='text-center'>
	<?php
	if(empty($backupFileName)){
		?>
		<form class="ajax">
			<input type='hidden' name='formAction' value='createBackup'/>
			<?=$this->element('button', ['label'=>"Generar Respaldo"])?>
		</form>
		<?php
	}
	if(!empty($backupFileName)){
		?>
		<a href='/Admin/DownloadBackup/<?=$backupFileName?>'>
			<?=$this->element('button', ['label'=>"Descargar"])?>
		</a>
		<?php
	}
	?>
</div>