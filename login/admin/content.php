		<!--  -->
		<div class="admin">
			<div class="admin_left clearfix">
				<div class="admin_left_menu">
					<a href="<?php echo HTTP; ?>login/admin/">ダッシュボード</a>
					<a href="<?php echo HTTP; ?>channel/<?php echo $_SESSION['judge_id']; ?>/" target="_blank">マイページ</a>
				</div>

				<!--  -->
				<div class="admin_left_menu">
					<ol>
						<li>
							<dl>
								<dt>投稿</dt>
								<dd><a href="<?php echo HTTP; ?>login/admin/matome/" target="_blank">まとめ作成</a></dd>
								<?php if($_SESSION["judge_id"] == 'mtoksuy') { echo '<dd><a href="'.HTTP.'login/admin/post/">新規追加(廃止)</a></dd>'; } ?>
								<dd><a href="<?php echo HTTP; ?>login/admin/list/">投稿一覧</a></dd>
								<dd><a href="<?php echo HTTP; ?>login/admin/draft/list/">下書き一覧</a></dd>


								<dt>再編集</dt>
								<dd><a href="<?php echo HTTP; ?>login/admin/matome/delete/list/">削除一覧</a></dd>







								<dt>アナリティクス</dt>
								<dd><a href="<?php echo HTTP; ?>login/admin/analytics/">サマリー(30日間)</a></dd>
								<dd><a href="<?php echo HTTP; ?>login/admin/analytics/limit/30/new_articles/">サマリー(新着のみ)</a></dd>
								<dt>インセンティブ</dt>
								<dd><a href="<?php echo HTTP; ?>login/admin/incentive/">インセンティブ</a></dd>

								<?php if($_SESSION["judge_id"] == 'mtoksuy') { echo '<dt>マスター専用</dt>';} ?>
								<?php if($_SESSION["judge_id"] == 'mtoksuy') { echo '<dd><a href="'.HTTP.'login/admin/mail/">メール送信</a></dd>'; } ?>
								<?php if($_SESSION["judge_id"] == 'mtoksuy') { echo '<dd><a href="'.HTTP.'login/admin/recommendarticle/">注目まとめ追加</a></dd>'; } ?>
								<?php if($_SESSION["judge_id"] == 'mtoksuy') { echo '<dd><a href="'.HTTP.'login/admin/famearticle/">殿堂まとめ追加</a></dd>'; } ?>
								<?php if($_SESSION["judge_id"] == 'mtoksuy') { echo '<dd><a href="'.HTTP.'login/admin/decoration/">装飾CSSコピー</a></dd>'; } ?>
								<?php if($_SESSION["judge_id"] == 'mtoksuy') { echo '<dd><a href="'.HTTP.'permalink/image_html_generate.php/">連続画像HTML生成</a></dd>'; } ?>
								<?php if($_SESSION["judge_id"] == 'mtoksuy') { echo '<dd><a href="'.HTTP.'login/admin/imageupload/">画像アップロード</a></dd>'; } ?>
								<?php if($_SESSION["judge_id"] == 'mtoksuy') { echo '<dd><a href="'.HTTP.'login/admin/access/">アクセスランキング</a></dd>'; } ?>
								<?php if($_SESSION["judge_id"] == 'mtoksuy') { echo '<dd><a href="'.HTTP.'login/admin/twitterscraping/">Twitter・Tweet埋め込みツール Var.1.00</a></dd>'; } ?>
								<?php if($_SESSION["judge_id"] == 'mtoksuy') { echo '<dd><a href="'.HTTP.'login/admin/incentiveticket/">インセンティブチケット</a></dd>'; } ?>


								<dt>アカウント</dt>
								<dd><a href="<?php echo HTTP; ?>login/admin/userprofileedit/">プロフィール編集</a></dd>
								<dd><a href="<?php echo HTTP; ?>login/admin/usersetupedit/">アカウント設定</a></dd>
								<dd><a href="<?php echo HTTP; ?>login/admin/userbankedit/">報酬受け取り先編集</a></dd>



								<?php if($_SESSION["judge_id"] == 'mtoksuy') { 
									echo '<dt>Root</dt>';
									echo '<dd><a href="'.HTTP.'login/admin/root/list/">投稿一覧</a></dd>';
									echo '<dd><a href="'.HTTP.'login/admin/root/draft/list/">下書き一覧</a></dd>';
									echo '<dt>便利機能</dt>';
									echo '<dd><a href="'.HTTP.'login/admin/sitemap/">Sitemap.xml生成</a></dd>';

 } ?>
							</dl>
						</li>
					</ol>
				</div>
				<!-- 後で使う -->
				<div class="admin_left_menu">
					
				</div>
			</div>
			<!--  -->
			<div class="admin_right">
				<div class="admin_right_block_logout">
					<a href="<?php echo HTTP; ?>login/admin/logout/">ログアウト</a>
				</div>
					<?php echo $view_data["content"]; ?>
			</div>
		</div>
