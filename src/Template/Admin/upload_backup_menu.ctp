<?php ?>
<h2 class='text-center'>Restaurar Backup</h2>
<form class="ajax">
	<div class="formResponsive">
		<div>
			<div>Archivo</div>
			<div>
				<input type='file' name='backup' />
			</div>
		</div>
	</div>

	<div class='text-center'>
		<input type='hidden' name='formAction' value='restoreBackup'/>
		<?=$this->element('button', ['label'=>"Restaurar"])?>
	</div>
</form>