<?php ?>
<!DOCTYPE html>
<html>
	<head>
		<?= $this->Html->charset() ?>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
		<title>
			<?=$site_title?>
		</title>

		<?php
		$version=4;
		?>

		<link href="/bootstrap-3.3.5-dist/css/bootstrap.css?<?=$version?>" rel="stylesheet" type="text/css">
		<link href="/bootstrap-3.3.5-dist/css/docs.min.css?<?=$version?>" rel="stylesheet" type="text/css">


		<link href="/css/layout.css?<?=$version?>" rel="stylesheet" type="text/css"/>
		<link href="/css/header.css?<?=$version?>" rel="stylesheet" type="text/css"/>
		<link href="/css/itemList.css?<?=$version?>" rel="stylesheet" type="text/css"/>
		<link href="/css/sectionInfo.css?<?=$version?>" rel="stylesheet" type="text/css"/>
		<link href="/css/formResponsive.css?<?=$version?>" rel="stylesheet" type="text/css"/>
		<link href="/css/btn-custom.css?<?=$version?>" rel="stylesheet" type="text/css"/>
		<link href="/css/image_group.css?<?=$version?>" rel="stylesheet" type="text/css"/>
		<link href="/css/modalMenuXs.css?<?=$version?>" rel="stylesheet" type="text/css"/>
		<link href="/spectrum/spectrum.css?<?=$version?>" rel="stylesheet" type="text/css"/>
		<link href="/css/imageZoom.css?<?=$version?>" rel="stylesheet" type="text/css"/>
		<link href="/css/richTextArea.css?<?=$version?>" rel="stylesheet" type="text/css"/>

		<script src="/js/jquery-1.11.3.min.js?<?=$version?>" type="text/javascript"></script>
		<script src="/tinymce/js/tinymce/tinymce.min.js?<?=$version?>" type="text/javascript"></script>
		<script src="/bootstrap-3.3.5-dist/js/bootstrap.min.js?<?=$version?>" type="text/javascript"></script>
		<script src="/js/functions.js?<?=$version?>" type="text/javascript"></script>
		<script src="/spectrum/spectrum.js?<?=$version?>" type="text/javascript"></script>
		<script src="/js/ajax.js?<?=$version?>" type="text/javascript"></script>
		<script src="/js/formHelper.js?<?=$version?>" type="text/javascript"></script>
	</head>
	<body>
		<div id='mainHead'>
			<?=$this->element('header')?>
		</div>
		<div id='mainBody'>
			<div id="mainBodyPadding">
				<?= $this->fetch('content')?>
			</div>
		</div>
		<div id='mainFooter'>
			<div id="mainFooterPadding">
				<?=nl2br($site_footer)?>
			</div>
		</div>

		<?=$this->element('modalMenuXs')?>
		<?=$this->element('imageZoom')?>
		<?=$this->element('modalAjaxBlock')?>
		<script>
			setFormsSubmitEvent();
		</script>
		
		<style>
			<?php if(!empty($site_color_header_1)){
				?>
				#mainHead{background-color: <?=$site_color_header_1?>;}
				<?php
			}
			if(!empty($site_color_header_2)){
				?>
				#header .name{background-color: <?=$site_color_header_2?>;}
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
	</body>
</html>
