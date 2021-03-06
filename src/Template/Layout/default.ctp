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
		$version=11;
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
		<link href="/css/image_group_admin.css?<?=$version?>" rel="stylesheet" type="text/css"/>
		<link href="/css/modalMenuXs.css?<?=$version?>" rel="stylesheet" type="text/css"/>
		<link href="/spectrum/spectrum.css?<?=$version?>" rel="stylesheet" type="text/css"/>
		<link href="/css/imageZoom.css?<?=$version?>" rel="stylesheet" type="text/css"/>
		<link href="/css/richTextArea.css?<?=$version?>" rel="stylesheet" type="text/css"/>
		<link href="/css/inputDate.css?<?=$version?>" rel="stylesheet" type="text/css"/>
		<link href="/css/pagination.css?<?=$version?>" rel="stylesheet" type="text/css"/>
		<link href="/anytime/anytime.5.1.2.css?<?=$version?>" rel="stylesheet" >
		<link href="/anytime/anytimeFix.css?<?=$version?>" rel="stylesheet" >
		<link href="/css/facebookComments.css?<?=$version?>" rel="stylesheet" type="text/css"/>
		<link href="/css/welcomeImage.css?<?=$version?>" rel="stylesheet" type="text/css"/>
		

		<script src="/js/jquery-1.11.3.min.js?<?=$version?>" type="text/javascript"></script>
		<script src="/tinymce/js/tinymce/tinymce.min.js?<?=$version?>" type="text/javascript"></script>
		<script src="/bootstrap-3.3.5-dist/js/bootstrap.min.js?<?=$version?>" type="text/javascript"></script>
		<script src="/js/functions.js?<?=$version?>" type="text/javascript"></script>
		<script src="/spectrum/spectrum.js?<?=$version?>" type="text/javascript"></script>
		<script src="/js/ajax.js?<?=$version?>" type="text/javascript"></script>
		<script src="/js/formHelper.js?<?=$version?>" type="text/javascript"></script>
		<script src="/anytime/anytime.5.1.2.js?<?=$version?>" type="text/javascript"></script>
		
		<style>
			<?php
			if(!empty($site_background_image)){
				?>
				body{
					background-repeat: no-repeat;
					background-size: cover;
					background-attachment: fixed;
					background-image: url(<?=$this->element('imageSrc', ['path'=>UPLOADS_DIRECTORY_WEB."/{$site_background_image['filename']}", 'w'=>1290, 'h'=>960])?>);
				}
			
				#fullWrap,
				body.adminMode #fullWrap{
					background: none
				}
				<?php
			}
			?>
		</style>
		
	</head>
	<body class="<?=@$adminMode? "adminMode" : ""?>">
		<div id="fullWrap">
			<div>
				<div id='mainHead'>
					<?=$this->element('header')?>
					<?php
					if(!empty($myUsername)){
						?>
						<div id="floatingUsername">
							Bienvenido <?=$myUsername?>
						</div>
						<?php
					}
					?>
				</div>
				<div id='mainBody'>
					<div id="mainBodyPadding">
						<?= $this->fetch('content')?>
					</div>
				</div>
				<div id='mainFooter'>
					<div id="mainFooterPadding">
						<?=nl2br($site_footer)?>
						<div class="text-center">
							<div class='logo_image' style='background-image: url(<?=$this->element('imageSrc', ['path'=>UPLOADS_DIRECTORY_WEB."/{$site_logo2_image['filename']}", 'w'=>100, 'h'=>100])?>);'></div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<?=$this->element('modalMenuXs')?>
		<?=$this->element('imageZoom')?>
		<?=$this->element('modalAjaxBlock')?>
		<?=$this->element('modalDatePicker')?>
		<?=$this->element('modalAlertYesNo')?>
		<?=$this->element('customCss')?>
		
		<script>
			setFormsSubmitEvent();
		</script>
		
		
	</body>
</html>
