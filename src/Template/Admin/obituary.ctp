<?php ?>
<h3 class='text-center'>
    Obituario
</h3>
<form class='ajax'>
	<div class="formResponsive">
		<div>
			<div>Titulo</div>
			<div>
				<input class='form-control' id='member_obituary_title' type='text' name='member_obituary_title' value='<?=$member_obituary_title?>'/>
				<div>
					<button class="btn btn-xs btn-primary" type="button" onclick="addTagTitle('{NOMBRE}');">Nombre</button>
					<button class="btn btn-xs btn-primary" type="button" onclick="addTagTitle('{AÑO_NACIMIENTO}');">Año nacimiento</button>
					<button class="btn btn-xs btn-primary" type="button" onclick="addTagTitle('{AÑO_MUERTE}');">Año muerte</button>
					<button class="btn btn-xs btn-primary" type="button" onclick="addTagTitle('{DEPORTES}');">Deportes</button>
				</div>
			</div>
		</div>
	</div>
	<br/>
	<br/>
	<textarea class='richTextArea' name='member_obituary_description'><?=$member_obituary_description?></textarea>
	<div>
		<button class="btn btn-xs btn-primary" type="button" onclick="addTagDescription('{NOMBRE}');">Nombre</button>
		<button class="btn btn-xs btn-primary" type="button" onclick="addTagDescription('{AÑO_NACIMIENTO}');">Año nacimiento</button>
		<button class="btn btn-xs btn-primary" type="button" onclick="addTagDescription('{AÑO_MUERTE}');">Año muerte</button>
		<button class="btn btn-xs btn-primary" type="button" onclick="addTagDescription('{DEPORTES}');">Deportes</button>
	</div>
	<br/>
	<div class='text-center'>
		<input type='hidden' name='formAction' value='updateObituary'/>
		<?=$this->element('button', ['label'=>"Salvar"])?>
	</div>
	
</form>

<script>
	makeRichtTextAreas();
	
	function addTagTitle(tag){
		var myField=$("#member_obituary_title")[0];
		
		if (myField.selectionStart || myField.selectionStart == '0') {
			var startPos = myField.selectionStart;
			var endPos = myField.selectionEnd;
			myField.value = myField.value.substring(0, startPos)
				+ tag
				+ myField.value.substring(endPos, myField.value.length);
		} else {
			myField.value += tag;
		}
	}
	
	function addTagDescription(tag){
		tinymce.activeEditor.execCommand('mceInsertContent', false, tag);
	}
</script>