/phpThumb/phpThumb.php?src=<?=$path?><?=@$w?"&w={$w}":""?><?=@$h?"&h={$h}":""?>&f=<?=pathinfo($path, PATHINFO_EXTENSION)=='png'? 'png':'jpeg'?>