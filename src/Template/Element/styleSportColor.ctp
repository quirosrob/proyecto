<?php ?>
<style>
	<?php
	if(!empty($color)){
		?>
		#mainBody{
			background: #73AEF1; /* Old browsers */
			background: -moz-linear-gradient(-80deg, <?=$color?> 0%, <?=$color?> 49%, #c9c9c9 55%, #c9c9c9 55%, #e3e4e5 100%); /* FF3.6-15 */
			background: -webkit-linear-gradient(-80deg, <?=$color?> 0%,<?=$color?> 49%,#c9c9c9 55%,#c9c9c9 55%,#e3e4e5 100%); /* Chrome10-25,Safari5.1-6 */
			background: linear-gradient(-80deg, <?=$color?> 0%,<?=$color?> 30%,#c9c9c9 30.1%,#c9c9c9 30.1%,#e3e4e5 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
			filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='<?=$color?>', endColorstr='#e3e4e5',GradientType=1 ); /* IE6-9 fallback on horizontal gradient */
		}
		<?php
	}
	?>
</style>

