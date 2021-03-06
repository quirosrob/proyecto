<?php ?>
<div id='header'>
	<div class='logo' style='background-image: url(<?=$this->element('imageSrc', ['path'=>UPLOADS_DIRECTORY_WEB."/{$site_logo_image['filename']}", 'w'=>100, 'h'=>100])?>);'></div>
    <div class='headerRight'>
	<div class='name'><?=$site_title?></div>
	<div class='divisor'></div>
	<div class='menu'>
	    <?php
	    foreach($menuItems as $menuItem){
			?>
			<div>
				<a href="<?=$menuItem['link']?>">
					<?=$this->element('buttonSm', ['label'=>$menuItem['desc'], 'class'=>@$menuItem['active']? "active":""])?>
				</a>
			</div>
			<?php
	    }
	    ?>
	</div>
    </div>
</div>

<div id='headerXs'>
    <div class='name'><?=$site_title_short?></div>
    <div class='openMenuXsWrap'>
		<button type="button" class="btn btn-custom" onclick="openMenuXs();">
			<span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span>
		</button>
    </div>
</div>