<?php 
class model_cron_sales_basis  {
	//----------------------------
	//
	//----------------------------
	public static function sales_letter_selecte($value) {
		 preg_match('/ジム|歯医者/',$value['list_name'], $value_array);
		 $keyword = $value_array[0];
		$sales_letter_1 = 
		'お世話になっております
最先端のSEOサービスをやらさせて頂いているUXSEO( https://uxseo.jp/ )の松岡 宗谷と申します。

突然のご連絡、ご容赦ください
簡単に自己紹介をさせていただきます

1982年10月12日生まれの戌年で動物が大好きです
南国を夢見て沖縄に移住しましたが、仕事の面で関東の方が総合的にメリットあると感じまして2ヶ月前に沖縄県から埼玉県に引っ越しました
日々知らない場所を探索したりキャンプが大好きで時折家族と一緒にキャンプ場へ行ったりして生活しています。

直近はスペースナビ株式会社を3年前に創業致しました
23年間インターネットを通じビジネスを行ってきましたが
既存のSEO会社のやり方・在り方に疑問を持って
UXSEO [3億PVから研究した'.date('Y').'年最新のSEO決定版サービス] https://uxseo.jp/ を開発致しました。

[経歴]
スタートアップ界隈でCTO
↓
Sharetube株式会社創業
↓
スペースナビ株式会社創業
↓
SEOに特化したUXSEO開発


この度は御社のサイト、'.$value['title'].'( '.$value['url'].' )をリサーチした所
勝手ながら改善すべき点を洗い出し改善を行えば必ずお役に立てると思いご連絡致しました。

[現在]
検索ワード：'.$value['list_name'].'
検索結果：'.$value['ranking'].'位
Speed評価：'.$value['score'].'点 1※
SSL対応：'.$value['http_ssl']. '
レスポンシブ対応：'.$value['responsive'].'
1※ Googleが展開しているサイト評価サービス( https://developers.google.com/speed/pagespeed/insights/ )

UXSEOで改善を致しますと・・・

[改善後]
検索ワード：'.$value['list_name'].'
検索結果：3位
Speed評価：80点
SSL対応：○
レスポンシブ対応：○

3ヶ月以内に改善後の結果になるとUXSEOで予測致しました
御社のサイトの検索結果を3位以上にアップさせる事を約束致します
お力添いをさせて頂きましたら幸いです。良いお付き合いをしたいと強く思っておりますのでご返信のほど何卒よろしくお願い致します。


■□■━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
スペースナビ株式会社 取締役
松岡 宗谷(まつおか そうや)

TEL： 080-4511-0257
email： souya_matsuoka@uxseo.jp
Twitter： https://twitter.com/mtoksuy/
Facebook： https://www.facebook.com/souya.matsuoka/

スペースナビ株式会社
https://spacenavi.jp/

UXSEO [3億PVから研究した'.date('Y').'年最新のSEO決定版サービス]
https://uxseo.jp/
━━━━━━━━━━━━━━━━━━━━━━━━━━━━ UXSEO■□■';


		$sales_letter_2 = 
		'お世話になっております
最先端のSEOサービスをやらさせて頂いているUXSEO( https://uxseo.jp/ )の松岡 宗谷と申します。

突然のご連絡、ご容赦ください
簡単に自己紹介をさせていただきます

1982年10月12日生まれの戌年で動物が大好きです
南国を夢見て沖縄に移住しましたが、仕事の面で関東の方が総合的にメリットあると感じまして2ヶ月前に沖縄県から埼玉県に引っ越しました
日々知らない場所を探索したりキャンプが大好きで時折家族と一緒にキャンプ場へ行ったりして生活しています。

直近はスペースナビ株式会社を3年前に創業致しました
23年間インターネットを通じビジネスを行ってきましたが
既存のSEO会社のやり方・在り方に疑問を持って
UXSEO [3億PVから研究した'.date('Y').'年最新のSEO決定版サービス] https://uxseo.jp/ を開発致しました。

[経歴]
スタートアップ界隈でCTO
↓
Sharetube株式会社創業
↓
スペースナビ株式会社創業
↓
SEOに特化したUXSEO開発


この度は御社のサイト、'.$value['title'].'( '.$value['url'].' )をリサーチした所
勝手ながら改善すべき点を洗い出し改善を行えば必ずお役に立てると思いご連絡致しました。

[現在]
検索ワード：'.$value['list_name'].'
検索結果：'.$value['ranking'].'位
Speed評価：'.$value['score'].'点 1※
SSL対応：'.$value['http_ssl']. '
レスポンシブ対応：'.$value['responsive'].'
1※ Googleが展開しているサイト評価サービス( https://developers.google.com/speed/pagespeed/insights/ )

UXSEOで改善を致しますと・・・

[改善後]
検索ワード：'.$value['list_name'].'
検索結果：3位
Speed評価：80点
SSL対応：○
レスポンシブ対応：○

3ヶ月以内に改善後の結果になるとUXSEOで予測致しました
御社のサイトの検索結果を3位以上にアップさせる事を約束致します
'.$keyword.'業界の検索順位を確実に上げてきた実績がある弊社ノウハウで御社のお力添いをさせて頂きましたら幸いです
良いお付き合いをしたいと強く思っておりますのでご返信のほど何卒よろしくお願い致します。


■□■━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
スペースナビ株式会社 取締役
松岡 宗谷(まつおか そうや)

TEL： 080-4511-0257
email： souya_matsuoka@uxseo.jp
Twitter： https://twitter.com/mtoksuy/
Facebook： https://www.facebook.com/souya.matsuoka/

スペースナビ株式会社
https://spacenavi.jp/

UXSEO [3億PVから研究した'.date('Y').'年最新のSEO決定版サービス]
https://uxseo.jp/
━━━━━━━━━━━━━━━━━━━━━━━━━━━━ UXSEO■□■';

		$sales_letter_3 = 
		'お世話になっております
最先端のSEOサービスをやらさせて頂いているUXSEO( https://uxseo.jp/ )の松岡 宗谷と申します。

突然のご連絡、ご容赦ください

この度は御社のサイト、'.$value['title'].'( '.$value['url'].' )をリサーチした所
勝手ながら改善すべき点を洗い出し改善を行えば必ずお役に立てると思いご連絡致しました。

[現在]
検索ワード：'.$value['list_name'].'
検索結果：'.$value['ranking'].'位
Speed評価：'.$value['score'].'点 1※
SSL対応：'.$value['http_ssl']. '
レスポンシブ対応：'.$value['responsive'].'
1※ Googleが展開しているサイト評価サービス( https://developers.google.com/speed/pagespeed/insights/ )

UXSEOで改善を致しますと・・・

[改善後]
検索ワード：'.$value['list_name'].'
検索結果：3位
Speed評価：80点
SSL対応：○
レスポンシブ対応：○

3ヶ月以内に改善後の結果になるとUXSEOで予測致しました
御社のサイトの検索結果を3位以上にアップさせる事を約束致します
'.$keyword.'業界の検索順位を確実に上げてきた実績がある弊社ノウハウで御社のお力添いをさせて頂きましたら幸いです
良いお付き合いをしたいと強く思っておりますのでご返信のほど何卒よろしくお願い致します。


■□■━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
スペースナビ株式会社 取締役
松岡 宗谷(まつおか そうや)

TEL： 080-4511-0257
email： souya_matsuoka@uxseo.jp
Twitter： https://twitter.com/mtoksuy/
Facebook： https://www.facebook.com/souya.matsuoka/

スペースナビ株式会社
https://spacenavi.jp/

UXSEO [3億PVから研究した'.date('Y').'年最新のSEO決定版サービス]
https://uxseo.jp/
━━━━━━━━━━━━━━━━━━━━━━━━━━━━ UXSEO■□■';

		// SSLとレスポンシブ が×の場合
		$sales_letter_4 = 
		'お世話になっております
最先端のSEOサービスをやらさせて頂いているUXSEO( https://uxseo.jp/ )の松岡 宗谷と申します。

突然のご連絡、ご容赦ください

この度は御社のサイト、'.$value['title'].'( '.$value['url'].' )をリサーチした所
勝手ながら改善すべき点を洗い出し改善を行えば必ずお役に立てると思いご連絡致しました。

[現在]
検索ワード：'.$value['list_name'].'
検索結果：'.$value['ranking'].'位
Speed評価：'.$value['score'].'点 1※
SSL対応：'.$value['http_ssl']. '
レスポンシブ対応：'.$value['responsive'].'
1※ Googleが展開しているサイト評価サービス( https://developers.google.com/speed/pagespeed/insights/ )

UXSEOで改善を致しますと・・・

[改善後]
検索ワード：'.$value['list_name'].'
検索結果：3位
Speed評価：80点

3ヶ月以内に改善後の結果になるとUXSEOで予測致しましたが、先にSSL対応とレスポンシブ対応をやらせていただきませんか？
SSL対応とレスポンシブ対応料金で3万円(税込み)のみで御社のお力添いをさせて頂きましたら幸いです
'.$keyword.'業界の検索順位を確実に上げてきた実績がある弊社ノウハウをご活用くださいませ

良いお付き合いをしたいと強く思っておりますのでご返信のほど何卒よろしくお願い致します。


■□■━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
スペースナビ株式会社 取締役
松岡 宗谷(まつおか そうや)

TEL： 080-4511-0257
email： souya_matsuoka@uxseo.jp
Twitter： https://twitter.com/mtoksuy/
Facebook： https://www.facebook.com/souya.matsuoka/

スペースナビ株式会社
https://spacenavi.jp/

UXSEO [3億PVから研究した'.date('Y').'年最新のSEO決定版サービス]
https://uxseo.jp/
━━━━━━━━━━━━━━━━━━━━━━━━━━━━ UXSEO■□■';

	$random_array = array($sales_letter_1,$sales_letter_1,$sales_letter_1,$sales_letter_1,$sales_letter_2,$sales_letter_2,$sales_letter_2,$sales_letter_2,
$sales_letter_3,$sales_letter_3);

		$rand_keys = array_rand($random_array);
		$sales_letter = $random_array[$rand_keys];
		if($rand_keys <= 3) {
			$sales_letter_type = 'A';
		}
		if($rand_keys > 3 && $rand_keys <= 7) {
			$sales_letter_type = 'B';
		}
		if($rand_keys > 7 && $rand_keys <= 9) {
			$sales_letter_type = 'C';
		}
		return [$sales_letter, $sales_letter_type, $sales_letter_4];
	}
	//----------------------------
	// 除外するワードクエリ取得
	//----------------------------
	public static function not_like_query_list_get() {
$not_like_query_list = "
		AND title NOT LIKE '%店舗一覧%' 
		AND title NOT LIKE '%一覧%' 
		AND title NOT LIKE '%まとめ%' 
		AND title NOT LIKE '%選%' 
		AND title NOT LIKE '%検索%' 
		AND title NOT LIKE '%情報%' 
		AND title NOT LIKE '%ボクシング%' 
		AND title NOT LIKE '%ヨガ%' 
		AND title NOT LIKE '%ボルダリング%' 
		AND title NOT LIKE '%goo地図%' 
		AND title NOT LIKE '%ホットペッパー%' 
		AND title NOT LIKE '%NAVITIME%' 
		AND title NOT LIKE '%レストラン%' 
		AND title NOT LIKE '%食べログ%' 
		AND title NOT LIKE '%ホテル%' 
		AND title NOT LIKE '%求人%' 
		AND title NOT LIKE '%ビックカメラ%' 
		AND title NOT LIKE '%ぐるなび%' 
		AND title NOT LIKE '%ランキング%' 
		AND title NOT LIKE '%MapFan%' 
		AND title NOT LIKE '%The-Training%' 
		AND title NOT LIKE '%Getfit%' 
		AND title NOT LIKE '%レンタルジム%' 
		AND title NOT LIKE '%レント%' 
		AND title NOT LIKE '%Yahoo%' 
		AND title NOT LIKE '%物件%' 
		AND title NOT LIKE '%格闘技%' 
		AND title NOT LIKE '%メディア%' 
		AND title NOT LIKE '%中古%' 
		AND title NOT LIKE '%アパマン%' 
		AND title NOT LIKE '%比較%' 
		AND title NOT LIKE '%YouTube%' 
		AND title NOT LIKE '%アメブロ%' 
		AND title NOT LIKE '%英語%' 
		AND title NOT LIKE '%ウーバーイーツ %' 
		AND title NOT LIKE '%新聞%' 
		AND title NOT LIKE '%マガジン%' 
		AND title NOT LIKE '%体験談%' 
		AND title NOT LIKE '%ガイド%' 
		AND title NOT LIKE '%note%' 
		AND title NOT LIKE '%サウナイキタイ%' 
		AND title NOT LIKE '%旅館%' 
		AND title NOT LIKE '%乗換案内NEXT%' 
		AND title NOT LIKE '%favy%' 
		AND title NOT LIKE '%流通%' 
		AND title NOT LIKE '%グルコミ%' 
		AND title NOT LIKE '%レンタルスペース%' 
		AND title NOT LIKE '%コナミスポーツクラブ%' 
		AND title NOT LIKE '%セントラルスポーツ%' 
		AND title NOT LIKE '%ルネサンス%' 
		AND title NOT LIKE '%ティップネス%' 
		AND title NOT LIKE '%LAVA%' 
		AND title NOT LIKE '%RIZAP%' 
		AND title NOT LIKE '%メガロス%' 
		AND title NOT LIKE '%ゴールド%' 
		AND title NOT LIKE '%ジェクサー%' 
		AND title NOT LIKE '%Viday%' 
		AND title NOT LIKE '%ビューティーパーク%' 
		AND title NOT LIKE '%カーブス%' 
		AND title NOT LIKE '%JOYFIT24%' 
		AND title NOT LIKE '%ジムセントラル24%' 
		AND title NOT LIKE '%ファストジム24%' 
		AND title NOT LIKE '%店舗を探す%' 
		AND title NOT LIKE '%ジモティー%' 
		AND title NOT LIKE '%店舗デザイン%' 
		AND title NOT LIKE '%トリップアドバイザー%' 
		AND title NOT LIKE '%Pathee%' 
		AND title NOT LIKE '%大学%' 
		AND title NOT LIKE '%オフィス%' 
		AND title NOT LIKE '%バイト%' 
		AND title NOT LIKE '%J-CAST%' 
		AND title NOT LIKE '%ゴルフ%' 
		AND title NOT LIKE '%ジムる%' 
		AND title NOT LIKE '%エニタイムフィットネス%' 
		AND title NOT LIKE '%EPARK%' 
		AND title NOT LIKE '%ダイエットコンシェルジュ%' 
		AND title NOT LIKE '%賃貸%' 
		AND title NOT LIKE '%アパートメント%' 
		AND title NOT LIKE '%トクバイ%' 
		AND title NOT LIKE '%時事ドットコム%' 
		AND title NOT LIKE '%クレビック%' 
		AND title NOT LIKE '%グローバルフィットネス%' 
		AND title NOT LIKE '%NAS%' 
		AND title NOT LIKE '%スペなび%' 
		AND title NOT LIKE '%TABI LABO%' 
		AND title NOT LIKE '%TRAINEES%' 
		AND title NOT LIKE '%駅近ドットコム%' 
		AND title NOT LIKE '%MY GYM%' 
		AND title NOT LIKE '%マンションブック%' 
		AND title NOT LIKE '%スタイルログ%' 
		AND title NOT LIKE '%スペースマーケット%' 
		AND title NOT LIKE '%BROS TOKYO%' 
		AND title NOT LIKE '%トランクルーム%' 
		AND title NOT LIKE '%Picuki%' 
		AND title NOT LIKE '%PRtree%' 
		AND title NOT LIKE '%にほんブログ村%' 
		AND title NOT LIKE '%インスタベース%' 
		AND title NOT LIKE '%HOTEL%' 
		AND title NOT LIKE '%7ワークアウト%' 
		AND title NOT LIKE '%事務の募集%' 
		AND title NOT LIKE '%aumo%' 
		AND title NOT LIKE '%スポーツセンター%' 
		AND title NOT LIKE '%B-BODY%' 
		AND title NOT LIKE '%すてきな街を、見に行こう%' 
		AND title NOT LIKE '%サイクルジム%' 
		AND title NOT LIKE '%ライブドアブログ%' 
		AND title NOT LIKE '%フィットネスコンシェルジュ%' 
		AND title NOT LIKE '%なび東京%' 
		AND title NOT LIKE '%マピオン電話帳%' 
		AND title NOT LIKE '%マチしる東京%' 
		AND title NOT LIKE '%センチュリー21%' 
		AND title NOT LIKE '%Infoseekニュース%' 
		AND title NOT LIKE '%DreamCoaching%' 
		AND title NOT LIKE '%Makuake%' 
		AND title NOT LIKE '%まいぷれ%' 
		AND title NOT LIKE '%エキサイトニュース%' 
		AND title NOT LIKE '%Retty%' 
		AND title NOT LIKE '%セントラルウェルネスクラブ%' 
		AND title NOT LIKE '%東京都交通局%' 
		AND title NOT LIKE '%Wikipedia%' 
		AND title NOT LIKE '%荒川102%' 
		AND title NOT LIKE '%公園%' 
		AND title NOT LIKE '%BODY-B%' 
		AND title NOT LIKE '%アットホーム%' 
		AND title NOT LIKE '%セントラルフィットネスクラブ%' 
		AND title NOT LIKE '%目黒区ドットコム%' 
		AND title NOT LIKE '%まいばすけっと%' 
		AND title NOT LIKE '%Coubic%' 
		AND title NOT LIKE '%CAMPFIRE%' 
		AND title NOT LIKE '%整骨院%' 
		AND title NOT LIKE '%レジデンストーキョー%' 
		AND title NOT LIKE '%ハムレット%' 
		AND title NOT LIKE '%いたっこ%'
		AND title NOT LIKE '%体育館%'
		AND title NOT LIKE '%アソビュー%'
		AND title NOT LIKE '%D-MAX%'
		AND title NOT LIKE '%sakuragym%'
		AND title NOT LIKE '% 自転車屋%'
		AND title NOT LIKE '%お出かけスポット%'
		AND title NOT LIKE '%ジョルダン%'
		AND title NOT LIKE '% ASCII%'
		AND title NOT LIKE '%あなたの街のスポーツジム%'
		AND title NOT LIKE '%フォートラベル%'
		AND title NOT LIKE '%オトコロドットコム%'
		AND title NOT LIKE '%ナビニュース%'
		AND title NOT LIKE '%JMA%'
		AND title NOT LIKE '%駐車場の神様%'
		AND title NOT LIKE '%News%'
		AND title NOT LIKE '%スイミング%'
		AND title NOT LIKE '%スポーツクラブ%'
		AND title NOT LIKE '%文化館%'
		AND title NOT LIKE '%体操教室%'
		AND title NOT LIKE '%価格ナビ%'
		AND title NOT LIKE '%スポーツ会館%'
		AND title NOT LIKE '%スポーツ施設%'
		AND title NOT LIKE '%ニコニコニュース%'
		AND title NOT LIKE '%健康センター%'
		AND title NOT LIKE '%楽天トラベル%'
		AND title NOT LIKE '%BEYOND%'
		AND title NOT LIKE '%ムエタイ%'
		AND title NOT LIKE '%マンション%'
		AND title NOT LIKE '%口コミ%'
		AND title NOT LIKE '%MEDIRE%'
		AND title NOT LIKE '%いい歯医者%'

		AND url NOT LIKE '%gymgym%'
		AND url NOT LIKE '%kasa.com%'
		AND url NOT LIKE '%laqua%'
		AND url NOT LIKE '%gymgigant%'
		AND url NOT LIKE '%weekend-kanazawa%'
		AND url NOT LIKE '%minhyo%'
		AND url NOT LIKE '%vitup%'
		AND url NOT LIKE '%fitpiper%'
		AND url NOT LIKE '%gu-life%'
		AND url NOT LIKE '%resama%'
		AND url NOT LIKE '%shuminavi%'
		AND url NOT LIKE '%coeteco%'
		AND url NOT LIKE '%ichishin%'
		AND url NOT LIKE '%naraun%'
		AND url NOT LIKE '%businessnavi%'
		AND url NOT LIKE '%concierge%'
		AND url NOT LIKE '%fudousan%'
		AND url NOT LIKE '%design-body%'
		AND url NOT LIKE '%trainingstudio-ace%'
		AND url NOT LIKE '%carecle%'
		AND url NOT LIKE '%b-monster%'

		AND url NOT LIKE '%kotsukaikan%'
		AND url NOT LIKE '%haisha-yoyaku-blog%'
		AND url NOT LIKE '%byoinnavi%'
		AND url NOT LIKE '%shika-plus%'
		AND url NOT LIKE '%epark%'
		AND url NOT LIKE '%machimachi%'
		AND url NOT LIKE '%medicalnote%'
		AND url NOT LIKE '%medley%'
		AND url NOT LIKE '%tokyo-doctors%'
		AND url NOT LIKE '%doctorsfile%'
		AND url NOT LIKE '%byoin-machi%'
		AND url NOT LIKE '%medical-reservet%'
		AND url NOT LIKE '%musee%'

";
		return $not_like_query_list;
	}

}
