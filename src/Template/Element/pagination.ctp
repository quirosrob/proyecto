<?php
if(isset($paginationCurrentPage)){
	$pagStart=($paginationCurrentPage+1);
	$pagEnd=($paginationCurrentPage+1);
	
	$next=true;
	$paginationTotalPages=ceil($paginationTotalItems/$paginationItemsPerPage);

	$length=5;
	$pagStart=($paginationCurrentPage+1)-$length<1? 1 : ($paginationCurrentPage+1)-$length;
	$pagEnd=($paginationCurrentPage+1)+$length>$paginationTotalPages? $paginationTotalPages : ($paginationCurrentPage+1)+$length;

	while($pagEnd-$pagStart>$length-1){
		if(($paginationCurrentPage+1)-$pagStart>$pagEnd-($paginationCurrentPage+1)){
			$pagStart++;
		}
		else{
			$pagEnd--;
		}

		if($pagEnd-$pagStart<$length){
			break;
		}
	}

	if($paginationCurrentPage+1>=$paginationTotalPages){
		$next=false;
	}
	?>
	<div class='text-center paginationWrap'>
		
		<nav>
			<ul class="pagination">
				<?php
				if($paginationCurrentPage>0){
					?>
					<li onclick="goPage(this, <?=$paginationCurrentPage-1?>)">
						<span aria-hidden="true">&laquo;</span>
					</li>
					<?php
				}
				else{
					?>
					<li class='disabled'>
						<span aria-hidden="true">&laquo;</span>
					</li>
					<?php
				}
				
				for($i=$pagStart; $i<=$pagEnd;$i++){
					?>
					<li class='<?=($paginationCurrentPage+1)==$i?'active':''?>' onclick="goPage(this, <?=$i-1?>)">
						<span aria-hidden="true"><?=$i?></span>
					</li>
					<?php
				}
				
				if($next){
					?>
					<li onclick="goPage(this, <?=$paginationCurrentPage+1?>)">
						<span aria-hidden="true">&raquo;</span>
					</li>
					<?php
				}
				else{
					?>
					<li class='disabled'>
						<span aria-hidden="true">&raquo;</span>
					</li>
					<?php
				}
				?>
			</ul>
		</nav>
		<form class='ajax'>
			<?php
			$paginationVars=[];
			foreach($_GET as $key => $val){
				$paginationVars[$key]=$val;
			}
			foreach($_POST as $key => $val){
				$paginationVars[$key]=$val;
			}
			foreach($paginationVars as $key => $val){
				if($key=='paginationCurrentPage'){
					continue;
				}
				?>
				<input type='hidden' name='<?=$key?>' value='<?=$val?>'/>
				<?php
			}
			?>
			<input type='hidden' name='paginationCurrentPage' class='paginationCurrentPage' value=''/>
		</form>
	</div>
	<script>
		function goPage(element, page){
			var form=$(element).parents('.paginationWrap').find('form');
			form.find('.paginationCurrentPage').val(page);
			form.submit();
		}
	</script>
	<?php
}