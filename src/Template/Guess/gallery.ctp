<?php ?>
<h3 class='text-center'>
    Trofeos 2018
</h3>
<div class="sectionInfo">
    <div class='main_image' style='background-image: url("<?=$this->element('imageSrcMainImage', ['path'=>"/img/galleries/trofeo.jpg"])?>");' onclick="openImageZoom('/img/galleries/trofeo.jpg')"></div>
    <div class='details'>
		<p>
			Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
		</p>
		<p>
			Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
		</p>
		<p>
			Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
		</p>
    </div>
	
	<?=$this->element('image_group', ['images'=>[
		['path'=>"/img/galleries/trofeo.jpg"],
		['path'=>"/img/galleries/trofeo.jpg"],
		['path'=>"/img/galleries/trofeo.jpg"],
		['path'=>"/img/galleries/trofeo.jpg"],
		['path'=>"/img/galleries/trofeo.jpg"],
	]])?>
</div>