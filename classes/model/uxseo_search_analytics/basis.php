<?php
class model_uxseo_search_analytics_basis {
	//////////////////
	// ランキング捜査
	//////////////////
	public static function Google_scraping($url,  $q, $search_num) {
		// やばい記事
		// https://blog.ver001.com/domdocument/
		// https://qiita.com/mpyw/items/c0312271819baee09132
		//エンコード
		$q = urlencode($q);
		//デコード
	//	$q = urldecode($q);
		// コンテキスト設定
		$opts = [
			'http' => [
				'method'           => 'GET',
	//			'request_fulluri' => true, // プロキシ通す場合は必須
	//			'proxy'              => 'tcp://150.95.190.137:3128',
				'header' => [
					'User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10.11; rv:52.0) Gecko/20100101 Firefox/52.0',
				]
			]
		];
//var_dump($search_num);

		// ストリームコンテキストを作成する
		$contect = stream_context_create($opts);
		$google_url = 'https://www.google.com/';
		//スクレイピングするurl生成
		if($search_num) {
			$google_search = $google_url.'search?q='.$q.'&start='.$search_num.'&hl=ja&rls=en&ie=UTF-8&oe=UTF-8';
		}
			else {
				$google_search = $google_url.'search?q='.$q.'&hl=ja&rls=en&ie=UTF-8&oe=UTF-8';
			}
	//		var_dump($google_search);
		// スクレイピング
//		$subject = file_get_contents($google_search, false, $contect);
		$url = 'https://spacenavi.jp/';
		$url = 'https://www.cman.jp/network/support/go_access.cgi';
//		$url = 'http://taruo.net/e/?';
		$google_search =$url;
//		pre_var_dump($google_search);
		//$url = $google_search;
		// https://qiita.com/4roro4/items/73d2b413ad0063848aa4
		// https://qiita.com/wanwanland/items/a5f9574fadd214d7b5c8 最強
		// https://qiita.com/tokutoku393/items/3c3ba3ca581bc0381e35

	    if (empty($curl)) {
	        $curl = curl_init();
	        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 10);
	        $agent = 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:17.0) Gecko/20100101 Firefox/17.0';
	        curl_setopt($curl, CURLOPT_USERAGENT, $agent);
			curl_setopt($curl,CURLOPT_HTTPHEADER,array (
	 	       "Content-Type: text/xml; charset=utf-8",
	 		 ));
	 		 curl_setopt($curl, CURLOPT_ENCODING, 'gzip');
	 		 // 試行時間
	 		 curl_setopt($curl, CURLOPT_TIMEOUT, 16);
	 		 // 最低速度
	 		 curl_setopt($curl, CURLOPT_LOW_SPEED_LIMIT, 8);
	 		 curl_setopt ($curl, CURLOPT_RETURNTRANSFER,true);
	 		 // プロキシの有効化
	 		 curl_setopt($curl, CURLOPT_HTTPPROXYTUNNEL, true);
	 		 curl_setopt($curl, CURLOPT_PROXYPORT, '8080');
	 		 curl_setopt($curl, CURLOPT_PROXY, 'http://150.95.190.137');
	    }
	    curl_setopt($curl, CURLOPT_URL, $google_search);
	    $html = curl_exec($curl);
		$html = mb_convert_encoding($html, "utf-8", "auto");
//		echo($html);
	//echo($subject);
		// エンコード
		$subject = mb_convert_encoding($html, 'HTML-ENTITIES', 'auto');
		echo $subject;
pre_var_dump($subject);






		$dom = new DOMDocument;
		@$dom->loadHTML($subject);
		$xpath = new DOMXPath($dom);
		$ul_nodes = $xpath->query('//div[@class="g"]');
		foreach ($ul_nodes as $node=>$key) {
			$children = $key->childNodes;
			$html = '';
			// HTMLへ戻し
			foreach($children as $child) {
			    $html .= $key->ownerDocument->saveHTML($child);
				$html = mb_convert_encoding($html, 'HTML-ENTITIES', 'auto');
			}
			@$dom->loadHTML($html);
			$xpath = new DOMXPath($dom);
			// 該当URLがあるか精査
			// あった場合ランキング順位取得
			$a_nodes = $xpath->query('//div[@class="r"]/a[@href="'.$url.'"]');
			foreach($a_nodes as $a_node=> $a_key) {
				$rank = $node;
			}
		}
		return $rank;
	}
}