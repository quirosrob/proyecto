<?php
if(!empty($images)){
	?>
	<link rel="stylesheet" type="text/css" href="/slick/slick.css"/>
	<link rel="stylesheet" type="text/css" href="/slick/slick-theme.css"/>
	<script type="text/javascript" src="/slick/slick.js"></script>

	<div class="slider-for">
		<?php
		foreach($images as $image){
			$path=UPLOADS_DIRECTORY_WEB."/{$image['filename']}";
			?>	
			<div>
				<div>
					<img src="<?=$this->element('imageSrc', ['path'=>$path, 'w'=>400, 'h'=>400])?>" alt=""/>
				</div>
			</div>
			<?php
		}
		?>
	</div>
	
	<div class='slider-nav-wrap'>
		<div class="slider-nav">
			<?php
			foreach($images as $image){
				$path=UPLOADS_DIRECTORY_WEB."/{$image['filename']}";
				?>	
				<div>
					<img src="<?=$this->element('imageSrc', ['path'=>$path, 'w'=>40, 'h'=>40])?>" alt=""/>
				</div>
				<?php
			}
			?>
		</div>
	</div>
	
	
	<script type="text/javascript">
		$(document).ready(function(){
			$('.slider-for').slick({
				slidesToShow: 1,
				slidesToScroll: 1,
				arrows: false,
				fade: true,
				asNavFor: '.slider-nav',
				adaptiveHeight: true,
				touchMove: false
			});
			
			$('.slider-nav').slick({
				slidesToShow: 3,
				slidesToScroll: 1,
				asNavFor: '.slider-for',
				dots: true,
//				centerMode: true,
				focusOnSelect: true
			});
		});		
	</script>

	<style>
		.slider-nav-wrap{
			text-align: center;
		}
		.slider-nav{
			max-width: 320px;
			width: 80%;
			display: inline-block;
			text-align: center;
		}
		
		.slider-nav img{
			height: 50px;
			display: inline-block;
		}
		
		.slider-for div{
			display: inline-block;
			width: 100%;
			text-align: center;
		}
		.slider-for img{
			display: inline-block;
			width: 100%;
			max-width: 400px;
		}
		.slider-for{
			overflow: hidden;
			overflow-x: hidden;
			overflow-y: hidden;
		}
		
		.slider-nav .slick-current{
			background-color: #BDBDBD;
		}
		
		.slider-for div,
		.slider-nav div {
			outline:0;
		}
		
		.slick-prev{
			left: -40px;
			width: 40px;
			height: 40px;
		}
		
		.slick-next{
			right: -40px;
			width: 40px;
			height: 40px;
		}
		
		.slick-prev:before, .slick-next:before{
			font-size: 40px;
		}
		
	</style>
	<?php
}