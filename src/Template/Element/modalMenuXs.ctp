<?php ?>
<div class="modal fade" id='modalMenuXs' tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Menú</h4>
			</div>
			<div class="modal-body">
				<div class='menu'>
					<?php
					foreach($menuItems as $menuItem){
						?>
						<div>
							<a href="<?=$menuItem['link']?>">
								<div class='item'>
									<?=$menuItem['desc']?>	
								</div>
							</a>
						</div>
						<?php
					}
					?>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
			</div>
		</div>
    </div>
</div>