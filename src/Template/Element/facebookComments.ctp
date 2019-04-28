<?php 
$isHttps=false;
if (array_key_exists("HTTPS", $_SERVER) && 'on' === $_SERVER["HTTPS"]) {
	$isHttps=true;
}
if (array_key_exists("SERVER_PORT", $_SERVER) && 443 === (int)$_SERVER["SERVER_PORT"]) {
	$isHttps=true;
}
if (array_key_exists("HTTP_X_FORWARDED_SSL", $_SERVER) && 'on' === $_SERVER["HTTP_X_FORWARDED_SSL"]) {
	$isHttps=true;
}
if (array_key_exists("HTTP_X_FORWARDED_PROTO", $_SERVER) && 'https' === $_SERVER["HTTP_X_FORWARDED_PROTO"]) {
	$isHttps=true;
}
$facebookReference=($isHttps? "https://" : "http://").$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
?>
<div class='facebookComments'>
	<div class='background'></div>
	<div id="fb-root"></div>
	<script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v3.2&appId=<?=$facebook_appId?>&autoLogAppEvents=1"></script>
	<div class="fb-comments" data-href="<?=$facebookReference?>" data-width="100%" data-numposts="5" data-order-by='reverse_time' data-colorscheme='light'></div>
</div>
