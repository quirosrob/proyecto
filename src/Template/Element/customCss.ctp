<?php ?>
<style>
	<?php 
	if(!empty($site_color_header_1)){
		?>
		#mainHead{background-color: <?=$site_color_header_1?>;}
		<?php
	}
	if(!empty($site_color_header_div)){
		?>
		#header .divisor{background-color: <?=$site_color_header_div?>;}
		<?php
	}
	if(!empty($site_color_header_2)){
		?>
		#header .name{background-color: <?=$site_color_header_2?>;}
		<?php
	}
	if(!empty($site_color_header_border)){
		?>
		#mainHead{border-color: <?=$site_color_header_border?>;}
		<?php
	}
	if(!empty($site_color_text)){
		?>
		body{color: <?=$site_color_text?>;}
		<?php
	}
	if(!empty($site_color_body_background)){
		?>
		#mainBody{background: <?=$site_color_body_background?>;}
		<?php
	}
	if(!empty($site_color_body_border)){
		?>
		#mainBody{border-color: <?=$site_color_body_border?>;}
		<?php
	}
	if(!empty($site_color_footer_background)){
		?>
		#mainFooter{background: <?=$site_color_footer_background?>;}
		<?php
	}
	if(!empty($site_color_footer_border)){
		?>
		#mainFooter{border-color: <?=$site_color_footer_border?>;}
		<?php
	}
	if(!empty($site_color_bottom_background)){
		?>
		.btn-custom{background-color: <?=$site_color_bottom_background?>;}
		<?php
	}
	if(!empty($site_color_bottom_border)){
		?>
		.btn-custom{border-color: <?=$site_color_bottom_border?>;}
		<?php
	}
	if(!empty($site_color_bottom_text)){
		?>
		.btn-custom{color: <?=$site_color_bottom_text?>;}
		<?php
	}
	if(!empty($site_color_bottom_background_active)){
		?>
		.btn-custom:hover, .btn-custom.active{background-color: <?=$site_color_bottom_background_active?>;}
		<?php
	}
	if(!empty($site_color_bottom_border_active)){
		?>
		.btn-custom:hover, .btn-custom.active{border-color: <?=$site_color_bottom_border_active?>;}
		<?php
	}
	if(!empty($site_color_bottom_text_active)){
		?>
		.btn-custom:hover, .btn-custom.active{color: <?=$site_color_bottom_text_active?>;}
		<?php
	}
	?>
</style>