<?php ?>
<h3 class='text-center'>PDF QRs</h3>

<form class='ajax'>
	<div class="sectionInfo">
		<div class="formResponsive">
			<div>
				<div>Fecha creación desde</div>
				<div>
					<?=$this->element('inputDate', ['name'=>'creationDateStart', 'value'=>$creationDateStart])?>
				</div>
			</div>
			<div>
				<div>Fecha creación hasta</div>
				<div>
					<?=$this->element('inputDate', ['name'=>'creationDateEnd', 'value'=>$creationDateEnd])?>
				</div>
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
			<input type='hidden' name='formAction' value='makePdfQrs'/>
			<?=$this->element('button', ['label'=>"Generar"])?>
		</div>
	</div>
</form>

<?php
if($formAction=='makePdfQrs'){
	?>
	<br/>
	<div class='text-center'>
		<a href='/img/qr/members.pdf' download>
			<?=$this->element('button', ['label'=>"Descargar"])?>
		</a>
	</div>
	<?php
}
?>

