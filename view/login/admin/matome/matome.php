			<!-- サムネイルで使用 -->
			<iframe name="shumbnail_iframe" id="" style="display: none;"></iframe>
				<!-- 文字カウントツール -->
				<div class="text_count_tool clearfix">
					<div class="text_count_tool_inner">
						<div class="text_count_tool_inner_count">
							<h4>現在のまとめ文字数</h4>
							<p class="count">0文字</p>
							<p>クオリティー度：<span class="rank"></span></p>
						</div>
					</div>
				</div>
				<!--
				低
				中
				高
				最高
				超絶
				神
				-->
				<!-- 文字装飾ツール -->
				<div class="text_design_tool clearfix">
					<div class="text_design_tool_content">
						<span class="text_design_tool_content_title"><span class="typcn typcn-pen"></span>文字装飾ツール</span>
						<ul class="text_design_tool_content_list clearfix">
							<li class="text_design_tool_content_list_change"><span class="typcn typcn-arrow-repeat"></span></li>
							<li class="text_design_tool_content_list_h3">
								<input type="button" class="text_design_tool_content_list_h3_button" value="中見出し">
							</li>
							<li class="text_design_tool_content_list_h4">
								<input type="button" class="text_design_tool_content_list_h4_button" value="小見出し">
							</li>
							<li class="text_design_tool_content_list_strong">
								<input type="button" class="text_design_tool_content_list_strong_button" value="強調する[SEO]">
							</li>
							<li class="text_design_tool_content_list_bold">
								<input type="button" class="text_design_tool_content_list_bold_button" value="太くする">
							</li>
							<li class="text_design_tool_content_list_marker">
								<input type="button" class="text_design_tool_content_list_marker_button" value="マーカー">
							</li>
						</ul>
					</div>
				</div>

				<div class="columns_2 clearfix">
						<!-- new_post -->
						<div class="new_post">
							<input class="matome_judge_id" type="hidden" name="matome_judge_id" value="<?php echo $_SESSION['judge_id'] ?>">
							<div class="new_post_contents">
								<h1 class="m_b_15">まとめ作成</h1>
									<?php 
										echo '<pre>';
//										var_dump($post_data);
										echo '</pre>';
									?>
								<input class="matome_title" id="title" type="text" name="title" value="<?php echo $post_data["post"]["title"]; ?>" placeholder="まとめタイトルを入力（50文字以内）">

								<!-- item_add -->
								<div class="item_add">
									<div class="item_add_content clearfix">
										<span class="item_add_content_title"><span class="typcn typcn-plus"></span>アイテムを追加</span>
										<ul class="item_add_content_list">
											<li class="item_add_content_list_link">リンク</li>
											<li class="item_add_content_list_image">画像</li>
											<li class="item_add_content_list_video">動画</li>
											<li class="item_add_content_list_quote">引用</li>
											<li class="item_add_content_list_twitter">Twitter</li>
											<li class="item_add_content_list_text">テキスト</li>
											<li class="item_add_content_list_title">見出し</li>
											<li class="item_add_content_list_change"><span class="typcn typcn-arrow-repeat"></span></li>
										</ul>
									</div> <!-- item_add_content -->
								</div> <!-- item_add -->
								<!-- matome -->
								<div class="matome">
									<div class="matome_content">
										<?php echo $post_data["post"]["sub_text"]; ?>
									</div> <!-- matome_content -->
								</div> <!-- matome -->
							</div> <!-- new_post_contents -->
						</div> <!-- new_post -->
						<!-- postboxs -->
						<div class="postboxs">
							<!-- postbox -->
							<div class="postbox">
								<h3>公開</h3>
								<div class="postbox_contents">
									<?php 
										// 削除済みまとめの場合
										if($post_data["post"]["delete_edit"]) {
												echo '<a id="post-preview" target="_blank" href="'.HTTP.'login/admin/matome/delete/preview/?p='.$post_data["post"]["primary_id"].'/" class="preview_button">プレビュー</a>
<input class="matome_delete_edit" type="submit" name="delete_edit" value="編集して保存">
												<input class="matome_reapply" type="submit" name="reapply" value="申請する">';
													// 許可する・許可しない
													if($_SESSION['judge_id'] == 'mtoksuy') {
														echo '<input class="matome_reapply_authorization" type="submit" name="authorization" value="許可する">';
														echo '<input class="matome_reapply_no_authorization" type="submit" name="no_authorization" value="許可しない">';
													}
											echo '<input class="matome_edit_primary_id" type="hidden" name="matome_edit_primary_id" value="'.$post_data["post"]["primary_id"].'">';
											echo '<input type="hidden" value="true" name="matome_delete_save" class="matome_delete_save">';
										}
										// エディットの場合
										else if($post_data["post"]["edit"]) {
											echo '<input class="matome_edit" type="submit" name="edit" value="編集する">';
											echo '<input class="matome_edit_primary_id" type="hidden" name="matome_edit_primary_id" value="'.$post_data["post"]["primary_id"].'">';
										}
											// それ以外
											else {
												echo '<a id="post-preview" target="_blank" href="'.HTTP.'login/admin/matome/preview/?p='.$post_data["post"]["primary_id"].'&amp;preview=true" class="preview_button">プレビュー</a>
												<input class="matome_draft" type="submit" name="draft" value="下書きとして保存">
												<input class="matome_submit" type="submit" name="submit" value="投稿する">';
											}

									// 下書きの場合 matome_draft_save matome_draft_primary_id
									if((int)$post_data["post"]["draft"] == 1) {
										echo '<input class="matome_draft_save" type="hidden" name="matome_draft_save" value="true">';
										echo '<input class="matome_draft_primary_id" type="hidden" name="matome_draft_primary_id" value="'.$post_data["post"]["primary_id"].'">';
									}
								?>
								</div>
							</div> <!-- postbox -->
							<!-- postbox -->
							<div class="postbox">
								<h3>テーマ</h3>
								<div class="postbox_contents">
									<input class="matome_tag" type="text" name="tag" value="<?php echo $post_data["post"]["tag"]; ?>" placeholder="テーマを入力(全角空白で区切れます。)">
								</div>
							</div> <!-- postbox -->
						</div> <!-- postboxs -->
				</div>
