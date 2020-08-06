<?php
// core読み込み
require_once('core.php');
var_dump('a');



$new_article_res = model_db::query("
	SELECT *
	FROM user");
pre_var_dump($new_article_res);



$s_number   = 0; // 今の所0設定の仕様でいく
$n_number   = 10; // マックス100
$q                = 'マックス';
$q_kyeword_array = array('マックス','号外'); // 最大キーワード数は5
//$q_kyeword_array = array('号外','マックス'); // 最大キーワード数は5
//$q_kyeword_array = array('マックス'); // 最大キーワード数は5
$target_site           = 'http://max-ae.co.jp/';
$target_site           = 'https://avex.jp/max/';





$Google_scraping_conf_array = array(
	's_number'           => $s_number,
	'n_number'           => $n_number,
	'q_kyeword_array' => $q_kyeword_array,
	'target_site'          => $target_site,
);
$Google_scraping_return_data_array = array();

function Google_scraping($Google_scraping_conf_array) {
	foreach($Google_scraping_conf_array['q_kyeword_array'] as $Google_scraping_key => $q) {
		/*
		オプションの引数：
		-h、--helpこのヘルプメッセージを表示して終了します
		-s N、--start N N番目の結果から開始
		-n N、-count NはN個の結果を表示します（デフォルトは10）
		*/
		// 検索
//		exec('googler -s'.$Google_scraping_conf_array['s_number'].' -n'.$Google_scraping_conf_array['n_number'].' '.$q.'',$googler_array);
//		sleep(5);
		
		// $q_array生成
		$q_array = array();
		$q_num   = 0;
		foreach($googler_array as $key => $value) {
			$rank_check = preg_match('/^( ([0-9]{0,3})\.)/', $value, $rank_array);
			if($rank_check) {
				$q_array[$q_num]   = array(preg_replace('/ /','',$googler_array[$key+1]));
				$q_array[$q_num][] = (int)$rank_array[2];
				$q_num++;
			}
		}

		// 検索順位取得
		$qq_check = 0;	
		$target_site = preg_replace('/\//','\/',$Google_scraping_conf_array['target_site']);
		foreach($q_array as $key => $value) {
			if(preg_match('/'.$target_site.'/',$value[0])) {
				$Google_scraping_return_data_array[$Google_scraping_key] = array($q);
				$Google_scraping_return_data_array[$Google_scraping_key][] = $value[1];
				$qq_check++;
			}
				else if($qq_check ===  0) {
					$Google_scraping_return_data_array[$Google_scraping_key] = array($q);
					$Google_scraping_return_data_array[$Google_scraping_key][] = '100位圏外';
				}
		}
		// 初期化
		$googler_array = array();
		$q_array          = array();
	} // q_kyeword_array
	return $Google_scraping_return_data_array;
} // function
$Google_scraping_return_data_array = Google_scraping($Google_scraping_conf_array);











?>