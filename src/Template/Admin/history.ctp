<?php ?>
<div class="text-right">
    <a href='/Admin/HistoryGalery/1'>
		<?=$this->element('buttonXs', ['label'=>'Galería'])?>
    </a>
</div>

<h3 class='text-center'>
    Historia
</h3>
<form class='ajax'>
	<textarea class='richTextArea' name='site_history'><?=$site_history?></textarea>
	<br/>
	<div class='text-center'>
		<input type='hidden' name='formAction' value='updateHistory'/>
		<?=$this->element('button', ['label'=>"Salvar"])?>
	</div>
</form>

<script>
	makeRichtTextAreas();
</script>