<?php
echo "Url Youtube : ";
$link = trim(fgets(STDIN))."\n";
if (preg_match('/https:\/\/youtu.be\/(.*?)$/', $link,$match)) {
	$id=$match[1];
echo "MQ 320x180 : https://i.ytimg.com/vi/".$id."/mqdefault.jpg\n";
echo "HQ 480x360 : https://i.ytimg.com/vi/".$id."/hqdefault.jpg\n";
echo "SD 640x480 : https://i.ytimg.com/vi/".$id."/sddefault.jpg\n";
echo "HD 1920x1080 : https://i.ytimg.com/vi/".$id."/maxresdefault.jpg\n";

}else if (preg_match('/https:\/\/www\.youtube\.com\/watch\?v=(.*?)&/', $link, $matches) ){
	echo "\n";
$id = $matches[1];
echo "MQ 320x180 : https://i.ytimg.com/vi/".$id."/mqdefault.jpg\n";
echo "HQ 480x360 : https://i.ytimg.com/vi/".$id."/hqdefault.jpg\n";
echo "SD 640x480 : https://i.ytimg.com/vi/".$id."/sddefault.jpg\n";
echo "HD 1920x1080 : https://i.ytimg.com/vi/".$id."/maxresdefault.jpg\n";
}else{
	echo "Please Input true url";
}

?>
