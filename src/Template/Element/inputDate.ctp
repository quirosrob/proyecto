<?php ?>
<div class="input-group inputDateWrap">
	<input readonly='' type='text' name='<?=@$name?>' value="<?=@$value?>" class="form-control inputDate"  onclick="openDatePicker(this)"/>
	<span class="input-group-btn">
        <button class="btn btn-primary" type="button" onclick="openDatePicker(this)">
			<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
		</button>
		<button class="btn btn-danger" type="button" onclick="clearDatePicker(this)">
			<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
		</button>
	</span>
</div>