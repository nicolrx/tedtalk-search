<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);
ini_set('max_execution_time', 300);
include('simple_html_dom.php');

function getInfoTed($url) {

	$urlVid = "https://www.ted.com/".$url;
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
		foreach($html->find('.talk-transcript__para__text') as $trans) {
			$item['author'] = trim($data->find('.talk-link__speaker', 0)  ->plaintext);
			$item['title'] = trim($data->find('.h9 a', 0)  ->plaintext);
			$item['date'] = trim($data->find('.meta__val', 0)  ->plaintext);
			$item['duration'] = $data->find('.thumb__duration', 0)  ->plaintext;
			$item['img'] = $data->find('.thumb__image', 0)  ->src;
			$item['trans_content'] = trim($trans->find('.talk-transcript__fragment', 0)  ->plaintext);
			$item['trans_time'] = trim($trans->find('.talk-transcript__fragment', 0)  ->id);
			$item['url'] = $urlVid."#".$item['trans_time'];
			$dataTed = json_encode($item);
			echo $dataTed;
		}
	}

}

$url = ['/talks/geoff_mulgan_post_crash_investing_in_a_better_world_1','/talks/hans_rosling_at_state'];
$string = file_get_contents("url-tedtalks.json");
$json_a = json_decode($string, true);
$count = count($json_a);


// var_dump($json_a);
// for ($i = 0; $i < $count; $i++) {
// 	$eachUrl = $json_a[$i]["url"];
// 	getInfoTed($eachUrl);
// }

?>
<script type="text/javascript" charset="utf-8" async="" data-requirecontext="_" data-requiremodule="libs" src="https://pa.tedcdn.com/javascripts/libs.js?20d4b250c391b47e594ae7d19dd75f61"></script>
<script type="text/javascript" charset="utf-8" async="" data-requirecontext="_" data-requiremodule="talk" src="https://pa.tedcdn.com/javascripts/talk.js?8f83512c1b8cd30640b533950faa4a9d"></script>

<div class="player player-hero__player player--uncropped player--flash">
<div class="player__container">
<div class="player-pip">
<div class="h:full player-pip__container">
<div class="player__container__focus player__container__video" href="#" role="button" title="Play/Pause"><object type="application/x-shockwave-flash" class="player__container__video" playsinline="playsinline" data="http://pb.tedcdn.com/assets/player/flash_hls/player_4_00_014.swf" id="ted-player-5839"><param name="bgcolor" value="#000000"><param name="quality" value="high"><param name="wmode" value="opaque"><param name="allowscriptaccess" value="always"><param name="allowfullscreen" value="true"><param name="flashvars" value="serviceHost=https%3A%2F%2Fwww.ted.com&amp;volume=0.5&amp;autoplay=0&amp;fullscreenEnabled=0"></object></div>
<a class="player-pip__watch-next ga-link" data-ga-category="talk.relatedTalk" data-ga-label="https://www.ted.com//talks/christopher_soghoian_a_brief_history_of_phone_wiretapping_and_how_to_avoid_it - stickybar" href="https://www.ted.com//talks/christopher_soghoian_a_brief_history_of_phone_wiretapping_and_how_to_avoid_it">
<div class="player-pip__watch-next__label">
Watch next
</div>
<div class="player-pip__watch-next__title">
Christopher Soghoian:
How to avoid surveillance ... with the phone in your pocket
</div>
<div class="player-pip__watch-next__arrow">
<i class="icon icon_arrow-alt-right player-pip__watch-next__arrow" title="arrow"></i><span class="screen-reader-text">arrow</span>
</div>
</a>
<div class="player-pip__controls">
  <div class="player-pip__thumb">
<span class="thumb thumb--[object Object] ">
  <span class="thumb__sizer"><span class="thumb__tugger"><img src="https://pi.tedcdn.com/r/pe.tedcdn.com/images/ted/2899795a51ccb8efdd620cb0b4352366d436af71_2880x1620.jpg?quality=89&amp;w=600" class="thumb__image" alt=""><span class="thumb__aligner"></span></span></span>

</span>
</div>

  <a class="player-pip__controls__button player-pip__controls__play" href="#">
    <i class="player-pip__controls__icon g-pip-play"></i>
  </a>

  <a class="player-pip__controls__button player-pip__controls__pause" href="#">
    <i class="player-pip__controls__icon g-pip-pause"></i>
  </a>
</div>

<div class="d:f p-x:2 a-i:c h:full">
  <div class="flx-g:1">
    <div style="padding-left: 140px;" class="p-r:1 player-pip__details">
<div class="player-pip__meta">
  <span class="player-pip__meta__event">TEDSummit</span>
  ·
  Filmed
  <span class="player-pip__meta__value">June 2016</span>
  ·
  <span class="player-pip__meta__value">7:44</span>
</div>

<a class="l3 player-pip__title player-pip__top-link" href="#">Christopher Soghoian: Your smartphone is a civil rights issue</a>
</div>
  </div>
  <div class="">
    <div class="d:f a-i:c">
    </div>
  </div>
</div></div>
</div>
<div class="player__container__cursor-killer"></div>
<div class="controls--mini"></div>
</div>
</div>
<!-- <iframe src="https://www.ted.com/talks/christopher_soghoian_your_smartphone_is_a_civil_rights_issue#t-37312" width="640" height="360" ></iframe> -->
