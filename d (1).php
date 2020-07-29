<?php
$file = $_GET['file'];
$name = $_GET['nm'];
$url = ''.$file.'';
header("user-agent: AVMDL_1.0.21.3_ANDROID");
header('Content-Disposition: attachment; filename="'.$name.'.mp3"');
header("Content-Type: audio/mp3");
readfile($url);
?>