<?php
$vid = $_REQUEST['vid'];
$name = $_REQUEST['name'];
if(isset($vid)){
$file = file_get_contents('https://api.resso.app/resso/player?device_platform=web&sim_region=in&media_id='.$vid.'&media_source=h5');
$json = json_decode($file, 1);
$sha1Auth = $json['player_info']['authorization'];
$player = $json['player_info']['url_player_info'];
$header = array('authorization: '.$sha1Auth.'');
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "$player&nobase64=true");
curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_TIMEOUT, 10);
$rspns = curl_exec($ch);
$data = json_decode($rspns, true);
//$fr1 = $data['video_info']['data']['video_list']['video_1']['quality'];
$q1 = $data['video_info']['data']['video_list']['video_1']['main_url'];
//$fr2 = $data['video_info']['data']['video_list']['video_1']['quality'];
//$q2 = $data['video_info']['data']['video_list']['video_2']['main_url'];
//$fr3 = $data['video_info']['data']['video_list']['video_1']['quality'];
//$q3 = $data['video_info']['data']['video_list']['video_3']['main_url'];
$qq = strstr($q1, '?', true);
header("Location: d.php?file=$qq&nm=$name");
}
else {
echo "Provide Video ID";
}
?>