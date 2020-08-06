<?php 
class model_gzip_html {
	//-----------
	//圧縮CSS作成
	//-----------
	public static function css_compression_create() {
		$core_css   = file_get_contents(PATH.'assets/css/core.css');
		$common_css = file_get_contents(PATH.'assets/css/common/common.css');
		$css = $core_css.$common_css;
/*
		// 開発環境のみ最新css読み込み
		if(preg_match('/localhost/',$_SERVER["HTTP_HOST"])) {
			$development_css = '
			  <link rel="stylesheet" href="'.HTTP.'assets/css/core.css?'.date('Y-m-d-H-i-s').'" type="text/css">
			  <link rel="stylesheet" href="'.HTTP.'assets/css/common/common.css?'.date('Y-m-d-H-i-s').'" type="text/css">';
		}
*/
		// css圧縮
		$css = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $css);
		// コロンの後の空白を削除する
		$css = str_replace(': ', ':', $css); 
		// タブ、スペース、改行などを削除する
		$css = str_replace( array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $css);
		return $css;
	}
	//-------
	//
	//--------
	public static function html_compression($html) {
		// 圧縮CSS作成
		$css = model_gzip_html::css_compression_create();
		// css削除
		$pattern = '/<link rel="stylesheet" href="(.*)" type="text\/css">/';
		preg_match_all($pattern, $html, $array);
		foreach($array[0] as $key => $value) {
			$value = preg_replace('/\//', '\/', $value);
			$pattern_key = '/'.$value.'/';
			$html = preg_replace($pattern_key, '', $html);
		}
		// 圧縮css追加
		$pattern = '/<!-- css -->/';
		$html = preg_replace($pattern, '<style>'.$css.'</style>', $html);
		// HTML圧縮
		$search = array(
			'/\>[^\S ]+/s',  // strip whitespaces after tags, except space
			'/[^\S ]+\</s',  // strip whitespaces before tags, except space
			'/(\s)+/s'       // shorten multiple whitespace sequences
		);
		$replace = array(
			'>',
			'<',
			'\\1'
		);
		$html = preg_replace($search, $replace, $html);
		return $html;
	}
	//------------------------
	//gzipファイルの中身を生成
	//-------------------------
	public static function gzip_root_html_create() {
//	pre_var_dump($article_data_array);
		$core_css   = file_get_contents(PATH.'assets/css/core.css');
		$common_css = file_get_contents(PATH.'assets/css/common/common.css');
		$css = $core_css.$common_css;
		// 開発環境のみ最新css読み込み
		if(preg_match('/localhost/',$_SERVER["HTTP_HOST"])) {
			$development_css = '
			  <link rel="stylesheet" href="'.HTTP.'assets/css/core.css?'.date('Y-m-d-H-i-s').'" type="text/css">
			  <link rel="stylesheet" href="'.HTTP.'assets/css/common/common.css?'.date('Y-m-d-H-i-s').'" type="text/css">';
		}

	// css圧縮
	$css = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $css);
	//$css = preg_replace('!/*[^*]**+([^/][^*]**+)*/!', '', $css); 
	// コロンの後の空白を削除する
	$css = str_replace(': ', ':', $css); 
	// タブ、スペース、改行などを削除する
	$css = str_replace( array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $css);

		$gzip_root_html = 
'<!DOCTYPE html>
<html>

	<head>
	  <title>'.TITLE.'</title>
	  <!-- meta -->
	  <meta charset="UTF-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
	  <meta name="keywords" content="'.META_KEYWORDS.'" />
	  <meta name="description" content="'.META_DESCRIPTION.'" />
	  <!-- icon -->
	  <link rel="shortcut icon" href="'.HTTP.'assets/img/icon/favicon_1.ico" type="image/vnd.microsoft.icon">
	  <link rel="apple-touch-icon" href="'.HTTP.'assets/img/icon/apple_touch_icon_1.png" />
	  <link rel="apple-touch-icon-precomposed" href="'.HTTP.'assets/img/icon/apple_touch_icon_1.png" />
	  <!-- css -->
	<style>
		'.$css.'
	</style>
	</head>
	<body>
		<!-- wrapper -->
		<div class="wrapper">
			<!-- header -->
			<header class="header" class="clearfix">
				<div class="header_inner clearfix">
				<!-- logo -->
				<div class="logo">
					<h1>
						<a href="'.HTTP.'"><img width="114" height="56" title="スペースナビ" alt="スペースナビ" src="'.HTTP.'assets/img/logo/logo_1.png"></a>
					</h1>
				</div> <!-- logo -->


		<!--  -->
		<nav class="drawer">
			<div class="drawer_inner">
				<ul>
<!--
					<li>
						<a class="o_8" href="'.HTTP.'about/">About</a> <!-- ソリューションを強調する -->
<!--
					</li>
-->
					<li>
						<a class="o_8" href="#service">Services</a> <!-- この会社ができることを紹介する -->
					</li>
<!--
					<li>
						<a class="o_8" href="'.HTTP.'/work">Work</a>
					</li>
					<li>
						<a class="o_8" href="'.HTTP.'/products">Products</a> 運営しているサービス紹介
					</li>
-->
					<li>
						<a class="o_8" href="'.HTTP.'/contact">Contact</a> <!-- お問い合わせ -->
					</li>
				</ul>
 <!-- 
webサイト(ホームページ)制作
webサービス制作
マーケティング
CMS
Webビジネスに関するコンサルティング
 -->
			</div>
		</div>
			</header>
			<!-- top_gallery -->
		<!-- top_gallery -->
		<div class="top_gallery">
			<div class="top_gallery_inner">
				<div class="top_gallery_inner_left">
					<p class="catch_top">Webサービス開発・Web高速化サービス</p>
					<h2 class="catch_title">圧倒的スピードで提供</h2>
					<p class="catch_bottom">クライアント様が思い描いたWebサービスをスピーディに開発。Web高速化サービスを行い最大5分の1以下の表示スピードで他競合サイトに差を。</p>
				</div>
			</div>
		</div>
		<div class="top_gallery_back">
			<img src="'.HTTP.'assets/img/common/top_grallery_back_3.png">
		</div>
			<!-- main -->
			<div class="main clearfix">
				<!-- main_inner -->
				<div class="main_inner clearfix">





					<!-- section_block -->
					<div id="service" style="padding-top: 50px; margin-top: -50px;" class="section_block">
						<p class="section_title_top">Service</p>
						<h2 class="section_title">2つのサービス</h2>
						<p class="section_title_bottom">最速でサービスを開発する事でPDCAを回しビジネス着手する一歩を。</p>
						<p class="section_title_bottom m_b_100">他の追随を許さない圧縮技術でビジネス課題を解決します。</p>
						<!-- section_block_box_right -->
						<div class="section_block_box_right">
							<div class="section_block_box_right_left_content">
								<img class="appeal_block_image_4" width="640" height="400" src="'.HTTP.'assets/img/common/macbook_pro_mockup_sharetube_1.png" title="SharetubeをPCで見た場合のイメージ図" alt="SharetubeをPCで見た場合のイメージ図">
							</div>
							<div class="section_block_box_right_right_content">
								<h2 class="section_block_box_title">Webサービス開発</h2>
								<p class="section_block_box_bottom">弊社の強みは何と言ってもWebサービス領域です。50以上の自社サービス・他社サービスを開発してきたノウハウでお力添えになれるよう最大限コミットさせていただきます。</p>
							</div>
						</div> <!-- section_block_box_right -->
						<!-- problem_solving -->
						<div class="problem_solving">
							<h3>こんな問題を解決します</h3>
							<ul>
								<li>
									<div class="problem_solving_li_inner">
										<h4>開発者が足りない</h4>
										<p>プロジェクトにジョインして開発のスピードを上げる事ができます。</p>
									</div>
								</li>
								<li>
									<div class="problem_solving_li_inner">
										<h4>開発費用を抑えたい</h4>
										<p>人数を雇えば雇うほど費用はかかります。弊社では最小の人数で最大のコミットをする事を約束します。</p>
									</div>
								</li>
								<li>
									<div class="problem_solving_li_inner">
										<h4>早く開発してほしい</h4>
										<p>いますぐ作ってほしい要望にお答えして圧倒的スピードを掲げてWebサービスを作ります。</p>
									</div>
								</li>
								<li>
									<div class="problem_solving_li_inner">
										<h4>仕様を口頭またはテキストで伝えたい</h4>
										<p>作成が煩わしい仕様書を省いて口頭・テキストのみでも問題ありません。細かいヒヤリングにて解決させていただきます。</p>
									</div>
								</li>
								<li>
									<div class="problem_solving_li_inner">
										<h4>早くビジネスを開始したい</h4>
										<p>サービスを作りビジネスを始める事こそが大事です。そのスタートラインまで最速で仕上げる事が可能です。</p>
									</div>
								</li>
								<li>
									<div class="problem_solving_li_inner">
										<h4>新しいサービス案の相談</h4>
										<p>大まかなアイデアは思いついてるが、詳細が描けてない問題を解決する事ができます。弊社で得た独自のノウハウで提案させていただきます。</p>
									</div>
								</li>
							</ul>
						</div> <!-- problem_solving -->



						<!-- contact_prompt -->
						<div class="contact_prompt">
							<div class="contact_prompt_inner clearfix">
								<p>イメージしているWebサービスを作りませんか？</p>
								<div class="contact_prompt_button">
									<a href="'.HTTP.'contact/">お問い合わせはこちら</a>
								</div>
							</div>
						</div> <!-- contact_prompt -->



<!--
						<div class="section_block_box_wave">
								<img width="640" height="400" src="'.HTTP.'assets/img/common/wave_top_8.png" title="" alt="">
						<div class="section_block_box_wave_inner">
	
						</div>
								<img width="640" height="400" src="'.HTTP.'assets/img/common/wave_bottom_8.png" title="" alt="">
						</div>
-->



						<!-- section_block_box_left -->
						<div class="section_block_box_left">
							<div class="section_block_box_left_left_content">
								<h2 class="section_block_box_title">Web高速化サービス</h2>
								<p class="section_block_box_bottom">私たちは見つけました。webページが高速であればあるほどビジネスが成功する事を。限界まで高速化する技術でビジネスにブーストを。</p>
							</div>
							<div class="section_block_box_left_right_content">
								<img class="appeal_block_image_4" width="640" height="400" src="'.HTTP.'assets/img/common/macbook_pro_mockup_sharetube_1.png" title="SharetubeをPCで見た場合のイメージ図" alt="SharetubeをPCで見た場合のイメージ図">
							</div>
						</div> <!-- section_block_box_left -->
						<!-- problem_solving -->
						<div class="problem_solving">
							<h3>こんな問題を解決します</h3>
							<ul>
								<li>
									<div class="problem_solving_li_inner">
										<h4>ページの表示スピードが遅い</h4>
										<p>動画に画像を多用しすぎて重いそのページを2分の1以下の表示スピードにする事ができます。</p>
									</div>
								</li>
								<li>
									<div class="problem_solving_li_inner">
										<h4>競合サイトよりSEOで優位に立ちたい</h4>
										<p>いつも競合サイトに負けてるこの現状を解決する為にサイト全体を見直し満足のいく結果を出します。</p>
									</div>
								</li>
								<li>
									<div class="problem_solving_li_inner">
										<h4>毎月のPVを増やしたい</h4>
										<p>伸び悩んでいるPVを上げビジネスに必須なコンバージョン数を増やしましょう。</p>
									</div>
								</li>
								<li>
									<div class="problem_solving_li_inner">
										<h4>ユーザー体験を高めたい</h4>
										<p>短い時間でページが表示するほどユーザー体験が高まります。良いサイトの必須条件である表示スピードを改善できます。</p>
									</div>
								</li>
								<li>
									<div class="problem_solving_li_inner">
										<h4>売上の底上げを行いたい</h4>
										<p>横ばいだった売り上げを50%〜150%ほど伸ばしてみませんか？高速化にはそれが可能です。</p>
									</div>
								</li>
								<li>
									<div class="problem_solving_li_inner">
										<h4>どこが遅いかわからない</h4>
										<p>何か問題で遅くなっているのかわからに問題も1つ1つ詳細に調べさせていただきます。</p>
									</div>
								</li>
							</ul>
						</div> <!-- problem_solving -->
					</div> <!-- section_block -->

						<!-- contact_prompt -->
						<div class="contact_prompt">
							<div class="contact_prompt_inner clearfix">
								<p>Web高速化を行いビジネスをブーストしませんか？</p>
								<div class="contact_prompt_button">
									<a href="'.HTTP.'contact/">お問い合わせはこちら</a>
								</div>
							</div>
						</div> <!-- contact_prompt -->












<!--


					<p>スペースナビ株式会社の公式ホームページ。サービス設計・作成、サーバー作成、メディア運営、マイニング、マイニングリグ販売を手がける株式会社です。</p>


					<div class="section_block">
						<h2>企業情報</h2>
						<p>宇宙をナビゲーションする会社に―</p>
						<p>人類が地球離れをする際に宇宙を案内し可能性を広げられる会社へ</p>
					</div>

					<div class="section_block">
						<h2>松岡宗谷 代表挨拶</h2>
						<p>21世紀を生きる者として新しい領域に夢を巡らすながら会社を育てて行きたいと考えています。</p>
						<p>永い時間軸で地球と人類を俯瞰すると目指すべきは地球の外にある事は間違いありません。求めらる前に一足先に宇宙を探索し、人類を最適化し幸せに暮らせるように貢献いたします。</p>
					</div>

					<div class="section_block">
						<h2>ビジョン・ミッション・バリュー</h2>
						<h3>ビジョン</h3>
						<p style="font-size: 20px;">人類と宇宙を結び世界を良い方向へ変えていく</p>
						<h3>ミッション</h3>
						<p style="font-size: 18px;">宇宙の案内人となる</p>
						<p style="margin: 0 0 30px 0;">「宇宙旅行」が当たり前の時代になるように環境を整える</p>
						<p style="font-size: 18px;">宇宙デブリをなくす</p>
						<p style="margin: 0 0 30px 0;">安心安全の場所になるように地球をメインにデブリをなくしていく</p>
						<p style="font-size: 18px;">宇宙で暮らせるよう注力する</p>
						<p style="margin: 0 0 30px 0;">星以外にもコロニーなどの人が快適に暮らせる場所を提供していく</p>
						<p style="font-size: 18px;">エネルギーを生み出す</p>
						<p style="margin: 0 0 30px 0;">快適に暮らす必要なエネルギーの創出に取り組む</p>
						<h3>バリュー</h3>
						<p>Spacenaviがミッションを遂行してビジョンを達成するために守るべき項目です。</p>

						<p>・良き世界を目指して<br>
						・ポジティブこそ前向きのエネルギー<br>
						・失敗は成功への糧<br>
						・全ての人にチャンスを<br>
						・常識を疑い捨てる<br>
						・サービスに国境はない<br>
						・公正なビジネス、組織を作る<br>
						・人を大事にしよう<br>
						・クリエイティブに敬意を</p>
					</div>

					<div class="section_block">
						<h2>運営サービス一覧</h2>
						<p style="margin: 0px;">Sharetube - シェアしたくなるコンテンツが集まる、集まる。</p>
						<p style="margin: 0 0 15px;"><a href="http://sharetube.jp/">http://sharetube.jp/</a></p>

						<p style="margin: 0px;">営業の進捗をサポート。営業における生産性を最適化するなら[Salesfllow]</p>
						<p style="margin: 0 0 15px;"><a href="https://salesfllow.cloud/">https://salesfllow.cloud/</a></p>

						<p style="margin: 0px;">モグラMINE - 全ての人にマイニングを。</p>
						<p style="margin: 0 0 15px;"><a href="https://mogramine.com/">https://mogramine.com/</a></p>
					</div>

					<div class="section_block">
						<h2>会社概要</h2>
						<style>
						table th {
						    text-align: left;
						    vertical-align: top;
								min-width: 100px;
						}
						</style>

						<table>
							<colgroup>
								<col class="w-30">
								<col class="w-70">
							</colgroup>
							<tbody>
								<tr>
									<th>社名（商号）</th>
									<td>スペースナビ株式会社<br>
								（英文社名）Spacenavi Inc.</td>
								</tr>
								<tr>
									<th>設立年月日</th>
									<td>2018年06月31日</td>
								</tr>
								<tr>
									<th>本社所在地</th>
									<td>〒175-0083 東京都板橋区徳丸3-41-31 清春荘202<br>
								</td>
								</tr>
								<tr>
									<th>代表者</th>
									<td>松岡 宗谷</td>
								</tr>
								<tr>
									<th>資本金</th>
									<td>8万円</td>
								</tr>
								<tr>
									<th>事業内容</th>
									<td>サービス設計・作成、サーバー作成、メディア運営、マイニング、マイニングリグ販売</td>
								</tr>
							</tbody>
						</table>
					</div>


-->
				</div>
			</div> <!-- main -->


			<!-- footer -->
			<footer class="footer clear">
				<!-- footer_inner -->
				<div class="footer_inner clearfix">
					<div class="footer_box">
							<img width="114" height="56" src="'.HTTP.'assets/img/logo/logo_1.png">
					</div>
					<div class="footer_box">
						<h4>ABOUT AS</h4>
						<p>スペースナビはWebサービス開発・Web高速化に特化したプロフェッショナルチームです。</p>
					</div>
				</div> <!-- footer_inner -->
				<!-- footer_bottom -->
				<div class="footer_bottom">
					<div class="footer_bottom_inner">
						<!-- コピーライト -->
						<section class="copy">
							<p class="m_0">&copy; '.date('Y').' Spacenavi Inc. All rights reserved. </p>
						</section>
					</div>
				</div>
			</footer>  <!-- footer -->
		</div> <!-- wrapper -->
	</body>
</html>';

	// HTML圧縮
	$search = array(
		'/\>[^\S ]+/s',  // strip whitespaces after tags, except space
		'/[^\S ]+\</s',  // strip whitespaces before tags, except space
		'/(\s)+/s'       // shorten multiple whitespace sequences
	);
	$replace = array(
		'>',
		'<',
		'\\1'
	);
	$gzip_root_html = preg_replace($search, $replace, $gzip_root_html);

	return $gzip_root_html;
	}



	//------------------------
	//gzipファイルの中身を生成
	//-------------------------
	public static function gzip_article_html_create($article_data_array) {
//	pre_var_dump($article_data_array);
		$core_css   = file_get_contents(PATH.'assets/css/core.css');
		$common_css = file_get_contents(PATH.'assets/css/common/common.css');
		$matome_css = file_get_contents(PATH.'assets/css/matome/common.css');
		$css = $core_css.$common_css.$matome_css;
		// 開発環境のみ最新css読み込み
		if(preg_match('/localhost/',$_SERVER["HTTP_HOST"])) {
			$development_css = '
			  <link rel="stylesheet" href="'.HTTP.'assets/css/core.css?'.date('Y-m-d-H-i-s').'" type="text/css">
			  <link rel="stylesheet" href="'.HTTP.'assets/css/common/common.css?'.date('Y-m-d-H-i-s').'" type="text/css">
			  <link rel="stylesheet" href="'.HTTP.'assets/css/matome/common.css?'.date('Y-m-d-H-i-s').'" type="text/css">';
		}

	// css圧縮
	$css = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $css);
	//$css = preg_replace('!/*[^*]**+([^/][^*]**+)*/!', '', $css); 
	// コロンの後の空白を削除する
	$css = str_replace(': ', ':', $css); 
	// タブ、スペース、改行などを削除する
	$css = str_replace( array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $css);

		$gzip_article_html = 
'<!DOCTYPE html>
<html>
		<head>
	  <title>'.$article_data_array['article_title'].'｜'.TITLE.'</title>
	  <!-- meta -->
	  <meta charset="UTF-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
	  <!-- icon -->
	  <link rel="shortcut icon" href="'.HTTP.'assets/img/icon/favicon_1.ico" type="image/vnd.microsoft.icon">
	  <link rel="apple-touch-icon" href="'.HTTP.'assets/img/icon/apple_touch_icon_1.png" />
	  <link rel="apple-touch-icon-precomposed" href="'.HTTP.'assets/img/icon/apple_touch_icon_1.png" />
	  <!-- css -->
	<style>
		'.$css.'
	</style>
		'.$development_css.'
	</head>
	<body>
		<!-- wrapper -->
		<div class="wrapper">
				
	<!-- header -->
	<header class="header" class="clearfix">
		<div class="header_inner clearfix">
		<!-- logo -->
			<div class="logo">
				<h1>
					<a class="o_8" href="'.HTTP.'/"><img src="'.HTTP.'assets/img/logo/logo_3.png" width="85" height="32" alt="ジャッジ" title="ジャッジ"></a>
				</h1>
		</div>
	</header>
			<!-- main -->
			<div class="main clearfix">
				<!-- main_inner -->
				<div class="main_inner clearfix">
					'.$article_data_array['article_html'].'
				</div>
			</div> <!-- main -->
			
			<!-- footer -->
			<footer class="footer clear">
				<!-- footer_contents -->
				<div class="footer_contents clearfix">
					<!--  -->
					<div class="footer_contents_box clearfix">
						<h5>judgeについて</h5>
						<ul>
							<li><a href="'.HTTP.'about/">judgeについて</a></li>
							<li><a href="'.HTTP.'contact/">お問い合わせ</a></li>
						</ul>
					</div> <!--  -->
				</div> <!-- footer_contents -->
				<!-- footer_bottom -->
				<div class="footer_bottom">
					<div class="footer_bottom_contents">
						<!-- コピーライト -->
						<section id="copy">
							<p class="m_0">&copy; '.date('Y').' <a href="'.HTTP.'">judge</a></p>
						</section>
					</div>
				</div>
			</footer>  <!-- footer -->
		</div> <!-- wrapper -->
	</body>
</html>';

	// HTML圧縮
	$search = array(
		'/\>[^\S ]+/s',  // strip whitespaces after tags, except space
		'/[^\S ]+\</s',  // strip whitespaces before tags, except space
		'/(\s)+/s'       // shorten multiple whitespace sequences
	);
	$replace = array(
		'>',
		'<',
		'\\1'
	);
	$gzip_article_html = preg_replace($search, $replace, $gzip_article_html);

	return $gzip_article_html;
	}
}