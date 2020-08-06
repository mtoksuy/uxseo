<?php
class model_article_html {
	//----------------------
	//注目まとめ一覧HTML生成
	//----------------------
	public static function recommend_article_list_html_create($recommend_article_array, $article_type = 'article', $function_type = '注目') {
		foreach($recommend_article_array as $key => $value) {
			// 記事データ取得
			$article_author       = $value["judge_id"];
			$unix_time            = strtotime($value["create_time"]);
			$local_time           = date('Y-m-d', $unix_time);
			$local_japanese_time  = date('Y年m月d日', $unix_time);
			$article_year_time    = date('Y', $unix_time);

			// judgeのユーザーデータ取得
			$judge_user_data_array = model_info_basis::judge_user_data_get($article_author);
			// 改行を消す&タブ削除
			$article_contests = str_replace(array("\r\n", "\r", "\n", "\t"), '', $value["sub_text"].$value["text"]);
			// 出典元タグを取り除く
			$article_contests = preg_replace('/<div class="image_quote">.+?<\/div>/', '', $article_contests);
			// 本文を5680文字に丸める
			$article_contests = mb_strimwidth($article_contests, 0, 5680, "...", 'utf8'); // 応急処置 2018.01.31 なぜこれで直るかはわからん 下記のpreg_replaceが重すぎた
			// HTMLタグを取り除く
			$article_contests = preg_replace('/<("[^"]*"|\'[^\']*\'|[^\'">])*>/', '', $article_contests);
			// 追加を取り除く
			$article_contests = preg_replace('/追加/', '', $article_contests);
			// 本文を168文字に丸める
			$summary_contents = mb_strimwidth($article_contests, 0, 168, "...", 'utf8');
			// エンティティを戻す
			$title        = htmlspecialchars_decode($value["title"], ENT_NOQUOTES);
			// タイトルを82文字に丸める
			$title = mb_strimwidth($title, 0, 82, "...", 'utf8');
			 $recommend_article_li .=
			 '<li class="o_8">
				<article>
					<a href="'.HTTP.'article/'.$value['link'].'/" class="clearfix">
						<div class="card_article_data clearfix">
							<h1>'.$title.'</h1>
							<div class="card_article_data_summary">'.$summary_contents.'</div>
							<div class="card_article_data_author">'.$judge_user_data_array['name'].'さん</div>
							<div class="card_article_data_time">'.$local_time.'</div>
						</div>
					</a>
				</article>
			</li>';
		}
		// 合体
		$recommend_article_html = 
			'<div class="card_article">
				<div class="card_article_inner">
					<div class="card_article_header">
						<span class="typcn typcn-document-text"></span><span>'.$function_type.'</span>
					</div>
					<ul>
						'.$recommend_article_li.'
					</ul>
				</div>
			</div>';
		return $recommend_article_html;
	}
	//------------------------------
	//注目まとめのページングHTML生成
	//------------------------------
	public static function recommend_article_paging_html_create($recommend_article_paging_data_array, $directory_name = 'recommendarticle') {
//		var_dump($recommend_article_paging_data_array);
/*
	array(4) { ["last_num"]=> int(922) ["list_num"]=> int(10) ["paging_num"]=> int(1) ["max_paging_num"]=> int(93) } 
*/

//var_dump($recommend_article_paging_data_array);
// prev作成
if($recommend_article_paging_data_array['max_paging_num'] >= 2 && $recommend_article_paging_data_array['paging_num'] >= 2) {
	$prev_num = $recommend_article_paging_data_array['paging_num']-1;
	$paging_prev_li = '<li class="sp_left"><a href="'.HTTP.$directory_name.'/'.$prev_num.'/">Prev</a></li>';
}
// next作成
if($recommend_article_paging_data_array['paging_num'] < $recommend_article_paging_data_array['max_paging_num']) {
	$next_num = $recommend_article_paging_data_array['paging_num']+1;
	$paging_next_li = '<li class="sp_right"><a href="'.HTTP.$directory_name.'/'.$next_num.'/">Next</a></li>';
}
// チェック
if(($recommend_article_paging_data_array['paging_num'] - 5) > 0) { $left_check = true; } else {$left_check = false; }
// チェック
if(($recommend_article_paging_data_array['paging_num'] + 5) <= $recommend_article_paging_data_array['max_paging_num']) { $right_check = true; } else {$right_check = false; }

$left_brink_num = $recommend_article_paging_data_array['paging_num'] - 1;
//$left_brink_num = 3 - 1;
$right_brink_num = $recommend_article_paging_data_array['max_paging_num'] - $recommend_article_paging_data_array['paging_num'];
//$right_brink_num = $recommend_article_paging_data_array['max_paging_num'] - 90;

$starting_point = 0;
$end_point  = 0;
/////////////
// 起点と終点
/////////////
if($left_check) {
	$starting_point = $recommend_article_paging_data_array['paging_num'] - 5;
}
	else {
		$starting_point = $recommend_article_paging_data_array['paging_num'] - $left_brink_num;
	}
if($right_check) {
	$end_point = ($starting_point + 9);
	if($recommend_article_paging_data_array['max_paging_num'] < $end_point) {
		$end_point = $recommend_article_paging_data_array['max_paging_num'];
	}
}
	else {
		$end_point = $recommend_article_paging_data_array['paging_num'] + $right_brink_num;
	}
		for($starting_point = $starting_point; $starting_point <= $end_point; $starting_point++) {
			if($starting_point == $recommend_article_paging_data_array['paging_num']) {
				$paging_li_html .= '<li class="sp_hidden"><span>'.$starting_point.'</span></li>';
			}
				else {
					$paging_li_html .= '<li class="sp_hidden"><a href="'.HTTP.$directory_name.'/'.$starting_point.'/">'.$starting_point.'</a></li>';
				}
		}
	$paging_html = 
		'<div class="recommend_article_paging">
			<div class="recommend_article_paging_inner">
				<ul class="clearfix">
					'.$paging_prev_li.'
					'.$paging_li_html.'
					'.$paging_next_li.'
				</ul>
			</div>
		</div>';
		return $paging_html;
	}
	//--------------
	//記事のHTML生成
	//--------------
	static function article_html_create($article_res, $article_type = 'article', $preview_frg = false) {
//pre_var_dump($article_res);
//		var_dump($preview_frg);
		// 変数
		$article_data_array = '';
		// 記事HTML生成
		foreach($article_res as $key => $value) {
			// 記事のprimary_id取得
			$article_primary_id   = $value["primary_id"];
			// 記事作成者取得
			$article_author       = $value["judge_id"];
			// 記事作成者データ取得
			$judge_user_data_array = Model_Info_Basis::judge_user_data_get($value["judge_id"]);

			// 記事作成時間取得
			$creation_time        = $value["create_time"];
			$unix_time            = strtotime($value["create_time"]);
			$year_time            = date('Y', $unix_time);
			$local_time           = date('Y-m-d', $unix_time);
			$local_japanese_time  = date('Y年m月d日', $unix_time);
			$article_year_time    = date('Y', $unix_time);
			// 記事更新時間取得
			$update_time                 = $value["update_time"];
			$update_unix_time            = strtotime($value["update_time"]);
			$update_local_japanese_time  = date('Y年m月d日', $update_unix_time);

			// 記事タイトル取得 // エンティティを戻す
			$article_title        = htmlspecialchars_decode($value["title"], ENT_NOQUOTES); // ダブルクォート、シングルクォートの両方をそのままにします。
			// 記事HTMLテキスト取得
			$article_contents     = $value["sub_text"].$value["text"];
			// リンク取得
			$article_link         = $value["link"];

			// 投稿日・更新日HTML生成
			$posted_date_time_html = Model_Article_Html::posted_date_time_html_create($local_time, $local_japanese_time);
			$update_date_time_html = Model_Article_Html::update_date_time_html_create($unix_time, $update_unix_time, $update_local_japanese_time);
			// 前のまとめ、次のまとめTML生成
			$detail_press_bottom_html = Model_Article_Html::article_previous_next_html_create($article_primary_id, $article_type);

			// まとめ記事の場合(重要)
			if($value["matome_frg"] == 1) {
				// まとめコンテンツリストHTML取得
				$value["sub_text"] = Model_Article_Html::matome_content_block_list_html_get($value["sub_text"]);
			}
			// 記事HTML生成
			$article_html = ('
				<article class="article" data-article_number="'.$value["primary_id"].'" data-article_year="'.$year_time.'">
					<div class="article_inner">
						<div class="article_data_header">
							<h1>'.$value["title"].'</h1>
						</div>
						<div class="article_contents">
							'.$value["sub_text"].'
						</div>
					</div>
					<!-- 前後のまとめ -->
					'.$detail_press_bottom_html.'
				</article>
			');
			// article_data_array
			$article_data_array = array(
				'article_primary_id'      => (int)$article_primary_id,
				'article_html'            => $article_html, 
				'article_title'           => $article_title, 
				'article_value'           => $article_value, 
				'article_contents'        => $article_contents,
				'article_link'            => $article_link, 
				'article_year_time'       => $article_year_time, 
			);
		}
		return $article_data_array;
	}  // function article_html_create() {
	//--------------
	//投稿日HTML生成
	//--------------
	public static function posted_date_time_html_create($local_time, $local_japanese_time) {
		$posted_date_time_html= 
			'<div class="posted_date_time">
				<span class="typcn typcn-watch"></span><span>Posted date：</span><time datetime="'.$local_time.'" pubdate="pubdate">'.$local_japanese_time.'</time>
			</div>';
		return $posted_date_time_html;
	}
	//--------------
	//更新日HTML生成
	//--------------
	public static function update_date_time_html_create($unix_time, $update_unix_time, $update_local_japanese_time) {
		if(($update_unix_time - $unix_time) > 86400) {
			$update_date_time_html= 
				'<div class="update_date_time">
					<span class="typcn typcn-arrow-repeat"></span>Update date：'.$update_local_japanese_time.'
				</div>';
		}
			else {

			}
		return $update_date_time_html;
	}
	//------------------------------
	//前のまとめ、次のまとめHTML生成
	//------------------------------
	static function article_previous_next_html_create($article_primary_id , $article_type) {
		// 変数
		$preview_html = '';
		$next_html    = '';
		// 前の記事、次の記事データ取得
		$article_previous_next_res_array = Model_Article_Basis::article_previous_next_get($article_primary_id , $article_type);
		// 前の記事HTML生成
		foreach($article_previous_next_res_array["previous"] as $key => $value) {
			$preview_html = ('<div class="previous"><a href="'.HTTP.''.$article_type.'/'.$value["link"].'/">
				<span class="typcn typcn-arrow-left"></span>
'.mb_strimwidth($value["title"], 0,124, '...').'</a></div>');
		}
		// 次の記事HTML生成
		foreach($article_previous_next_res_array["next"] as $key => $value) {
			$next_html = ('<div class="next"><a href="'.HTTP.''.$article_type.'/'.$value["link"].'/">'.mb_strimwidth($value["title"], 0, 124, '...').'
<span class="typcn typcn-arrow-right"></span>
</a></div>');
		}
		// 関連記事、前の記事、次の記事HTML生成
		$detail_article_bottom_html = 
			('<div class="previous_next">
				'.$preview_html.$next_html.'
			</div>');
		return $detail_article_bottom_html;
	}
	//------------------------------
	//まとめコンテンツリストHTML取得
	//------------------------------
	static function matome_content_block_list_html_get($article_html) {
		/*
			解決しました
			PHP Simple HTML DOM Parserで改行コードが削除される問題
			http://matomerge.com/simple-html-dom-parser-trouble/
			
			str_get_htmlの場合
			str_get_html($article_html, true, true, DEFAULT_TARGET_CHARSET, false);
			
			file_get_htmlの場合
			file_get_html($file, false, null, -1, -1, true, true, DEFAULT_TARGET_CHARSET, false);
		*/

		// simple_html_domライブラリ読み込み
		require_once PATH.'classes/library/simplehtmldom_1_5/simple_html_dom.php';
		// dom生成
		$article_html = str_get_html($article_html, true, true, DEFAULT_TARGET_CHARSET, false); // 文字列から
		// 挿入する変数
		$matome_content_block_list_html = '';
		// matome_content_blockのみ取得
		foreach($article_html->find('.matome_content_block') as $list) {
			 $matome_content_block_list_html .= $list->outertext;
		}
		//開放
		$article_html->clear();
		// 変数破棄
		unset($article_html);
//		var_dump($matome_content_block_list_html);
		return $matome_content_block_list_html;
	}











}