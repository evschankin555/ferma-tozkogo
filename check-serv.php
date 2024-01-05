<?php

$dateDD = date('Y_m_d');
$path = "/Бекапы/Несайты/обувь/ut_backup_2019_07_21.bak";
// $url = 'https://cloud-api.yandex.net/v1/disk/resources/?path='.urlencode($path);
$url = 'https://cloud-api.yandex.net/v1/disk/resources/upload?path='.urlencode($path);
$token = 'AgAAAAA2Hd0yAAXIy9SdLiJKZEwDhrC_OnG1a1E';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: OAuth ' . $token));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_HEADER, false);
$res = curl_exec($ch);
curl_close($ch);

?><pre><?print_r (json_decode($res, true));?></pre><?

/*function sendMessage($mess, $conn_id) {


    $url = 'https://api.telegram.org/bot436125245:AAFG2AgZtNmhrvF6IjU3abrycCAzrUOAoqw/sendMessage?disable_web_page_preview=true&chat_id=62305003&text='.$mess;

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "$url");
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    $result = curl_exec($ch);
    curl_close($ch);

	ftp_close($conn_id);
	die();
}

$conn_id = ftp_connect("midow1.ddns.net", 2122, 30);
if (!ftp_login($conn_id, "adm", "dkfljc00")) {
	sendMessage('проблема с подключением', $conn_id);
}

ftp_chdir($conn_id, "midow");
ftp_chdir($conn_id, "transmission");
ftp_chdir($conn_id, "downloads");
ftp_chdir($conn_id, "sites");

ftp_pasv($conn_id, true);

$dirFtps = ftp_nlist($conn_id, ".");

$hasFile = false;

foreach ($dirFtps as $file) {
	if (strpos($file, 'ut_backup_'.$dateDD) !== false) {
		$hasFile = true;
	}
}

if ($hasFile) {
    sendMessage('ok ok', $conn_id);
} else {
	sendMessage('файл не найден!!', $conn_id);
	sendMessage('файл не найден!!', $conn_id);
}

ftp_close($conn_id);*/