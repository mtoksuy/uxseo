<?php
// core読み込み
require_once('../core.php');
$i = 0;
$ii = 0;
$list_array = array();
$query     = '歯医者';
$gen_navitaime = 'https://www.navitime.co.jp/category/0802001/13106/';
while($i < 5) {
	if($i === 0) {
		$navitaime = $gen_navitaime;
	}
		else {
			$navitaime = $gen_navitaime.'?page='.$i;
	}
	$navitaime_html = file_get_contents($navitaime);
	$navitaime_html = preg_replace('/
	|	/', '', $navitaime_html);
	preg_match_all('/<dt class="spot\-name">(.*?)<\/dt>/', $navitaime_html, $navitaime_html_array);
	foreach($navitaime_html_array[1] as $key => $value) {
		$value = preg_replace('/\(.*?\)|〔(.*?)〕/', '', $value);
		$list_array[$ii] = $value;
		$ii++;
	}
	$i++;
}
foreach($list_array as $key => $value) {
	echo $value.' '.$query.'<br>';
}













