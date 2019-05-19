<?php
if(!empty($images)){
	?>
	<link rel="stylesheet" type="text/css" href="/slick/slick.css"/>
	<link rel="stylesheet" type="text/css" href="/slick/slick-theme.css"/>
	<script type="text/javascript" src="/slick/slick.min.js"></script>

	<div class="imageSlick">
		<?php
		foreach($images as $image){
			$path=UPLOADS_DIRECTORY_WEB."/{$image['filename']}";
			?>	
			<div>
				<div class="imgWrapSlick">
					<img src="<?=$this->element('imageSrc', ['path'=>$path, 'w'=>400, 'h'=>400])?>" alt=""/>
				</div>
			</div>
			<?php
		}
		?>
	</div>
	
	<script type="text/javascript">
		$(document).ready(function(){
		  $('.imageSlick').slick();
		});
	</script>

	<style>
		.imgWrapSlick{
			display: inline-block;
			width: 100%;
			text-align: center;
		}
		.imgWrapSlick img{
			display: inline-block;
			width: 100%;
			max-width: 400px;
		}
		
		.imageSlick .slick-next{
			right: 20px;
			z-index: 5000;
			font-size: 40px;
		}
		.imageSlick .slick-prev{
			left: 0px;
			z-index: 5000;
			font-size: 40px;
		}
		
		.imageSlick .slick-prev:before, 
		.imageSlick .slick-next:before{
			font-size: 40px;
		}
		
		.imageSlick {
			overflow: hidden;
			overflow-x: hidden;
			overflow-y: hidden;
		}
		
		
	</style>
	<?php
}