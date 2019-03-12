<?php ?>
<!DOCTYPE html>
<html>
	<head>
		<?= $this->Html->charset() ?>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
		<title>
			Salon de la Fama del Deporte Costarricense
		</title>

		<?php
		$version=3;
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

		<script src="/js/jquery-1.11.3.min.js?<?=$version?>" type="text/javascript"></script>
		<script src="/tinymce/js/tinymce/tinymce.min.js?<?=$version?>" type="text/javascript"></script>
		<script src="/bootstrap-3.3.5-dist/js/bootstrap.min.js?<?=$version?>" type="text/javascript"></script>
		<script src="/js/functions.js?<?=$version?>" type="text/javascript"></script>
		<script src="/spectrum/spectrum.js?<?=$version?>" type="text/javascript"></script>
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
				En el año 1960 se crea la Galeria del Deporte Costarricese, como una forma de perpetuar en la memoria de todos los tiempos,
				maximos exponente de la mayoria de diciplinas deportivas que se practican en el país.
			</div>
		</div>

		<?=$this->element('modalMenuXs')?>
		<?=$this->element('imageZoom')?>
	</body>
</html>
