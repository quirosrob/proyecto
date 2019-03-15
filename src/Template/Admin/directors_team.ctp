<?php ?>
<div class="text-right">
    <a href='/Admin/DirectorsTeamGallery/1'>
		<?=$this->element('buttonXs', ['label'=>'Galería'])?>
    </a>
</div>

<form class='ajax'>
    <div class="sectionInfo">
            <div class='main_image' style='background-image: url("<?=$this->element('imageSrcItemList', ['path'=>"/img/directors/junta-08-09.jpg"])?>");' onclick="openImageZoom('/img/directors/junta-08-09.jpg')"></div>

            <div class="formResponsive">
                    <div>
                            <div>Nombre</div>
                            <div><input class='form-control' type='text' name='name' value='Junta Directiva 2008-2009'/></div>
                    </div>
                    <div>
                            <div>Imagen</div>
                            <div>
                                    <input type='file' name='image_id' value=''/>
                            </div>
                    </div>
            </div>

            <textarea name='detail' class='richTextArea'>
                    <ul>
                            <li>PRESIDENTE: CARLOS CORTES PACHECO</li>		
                            <li>VICEPRESIDENTE: WALTER ELIZONDO GOMEZ</li>
                            <li>SECRETARIA: MARGARITA SEGREDA VIQUEZ</li>
                            <li>FISCAL: HUGO CHAMBERLAIN TREJOS</li>
                            <li>TESORERO: RENATO SOTO PACHECO</li>
                            <li>VOCAL I: EDGAR MARIN LEVI</li>
                            <li>VOCAL II: JUAN SOTO PARIS</li>
                            <li>VOCAL III: RODRIGO CALVO CHACON</li>
                    </ul>
            </textarea>
            <br/>
            <div class='text-center'>
                    <?=$this->element('button', ['label'=>"Salvar"])?>
            </div>

    </div>
</form>
<script>
	makeRichtTextAreas();
</script>