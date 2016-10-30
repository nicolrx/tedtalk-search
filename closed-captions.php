<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);
// ini_set('max_execution_time', 300);
include('simple_html_dom.php');

function getInfoTed($url) {

	$url = "https://www.ted.com/".$url."/transcript";

	// 	Curl init
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$result = curl_exec ($ch);
	curl_close($ch);

	// 	We get the html to scrape the video title
	$html = new simple_html_dom();
	$html->load($result);

	foreach($html->find('.talk-link') as $data) {
		$item['author'] = trim($data->find('.talk-link__speaker', 0)  ->plaintext);
		$item['title'] = trim($data->find('.h9 a', 0)  ->plaintext);
		$item['date'] = trim($data->find('.meta__val', 0)  ->plaintext);
		$item['duration'] = $data->find('.thumb__duration', 0)  ->plaintext;
		$item['img'] = $data->find('.thumb__image', 0)  ->src;


	}
		$dataTed = json_encode($item);
    return $dataTed;
}

$url = ['/talks/geoff_mulgan_post_crash_investing_in_a_better_world_1','/talks/hans_rosling_at_state'];

foreach ($url as $key=>$eachUrl) {
	echo getInfoTed($eachUrl);
}
